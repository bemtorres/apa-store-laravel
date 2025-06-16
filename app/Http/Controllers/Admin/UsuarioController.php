<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetalleSedeUsuario;
use App\Models\Sede;
use App\Models\Usuario;
use App\Services\AuditTraking;
use App\Services\ImportImage;
use App\Services\Policies\UsuarioPolicy;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
  private $policy;

  public function __construct() {
    $this->policy = new UsuarioPolicy();
  }

  public function index() {
    $this->policy->admin(current_user());

    $usuarios = Usuario::with('sede')->where('tipo_usuario', 2)->get();
    return view('admin.usuario.index', compact('usuarios'));
  }

  public function indexAdmin() {
    $this->policy->admin(current_user());

    $usuarios = Usuario::with('sede')->where('tipo_usuario', 1)->get();
    return view('admin.usuario.index', compact('usuarios'));
  }


  public function indexApp() {
    $this->policy->admin(current_user());

    $usuarios = Usuario::with('sede')->where('user_app', true)->get();
    return view('admin.usuario.index', compact('usuarios'));
  }

  public function create() {
    $this->policy->admin(current_user());

    $tipos = Usuario::TIPOS;
    $tipos_user = Usuario::TIPOSUSER;
    $sedes = Sede::all();

    AuditTraking::log(null, AuditTraking::TR, 'UsuarioController:create');


    return view('admin.usuario.create', compact('tipos','sedes','tipos_user'));
  }

  public function store(Request $request) {
    $this->policy->admin(current_user());
    $u = new Usuario();
    $u->run = $request->input('run');
    $u->correo = $request->input('correo');
    $u->nombre = $request->input('nombre');
    $u->segundo_apellido = $request->input('apellido_m');
    $u->primer_apellido = $request->input('apellido_p');
    $u->cargo = $request->input('cargo');
    $u->password = hash('sha256', $request->input('pass'));
    $u->tipo_general = $request->input('rol');

    // $u->user_app = $request->input('user_app') == 'si' ? true : false;

    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      ]);

      $filename = time();
      $folder = 'public/assets/personal/';
      $u->img = ImportImage::save($request, 'image', $filename, $folder);
    }

    $u->tipo_usuario = $request->input('admin') == 1 ? 1 : 2;
    $u->super_admin = $request->input('super') == 1 ? true : false;
    $u->id_sede = $request->input('sede');
    $u->save();

    AuditTraking::log($u, AuditTraking::TC, 'UsuarioController:store');


    return redirect()->route('usuarios.index')->with('success','Se ha creado correctamente');
  }

  public function show($id) {
    $this->policy->admin(current_user());

    $u = Usuario::findOrFail($id);
    AuditTraking::log($u, AuditTraking::TR, 'UsuarioController:show');

    return view('admin.usuario.show', compact('u'));
  }

  public function edit($id) {
    $this->policy->admin(current_user());

    $u = Usuario::findOrFail($id);
    $sedes = Sede::orderBy('nombre')->get();
    $tipos_user = Usuario::TIPOSUSER;

    AuditTraking::log($u, AuditTraking::TR, 'UsuarioController:edit');
    return view('admin.usuario.edit', compact('u', 'sedes','tipos_user'));
  }

  public function update(Request $request, $id) {
    $this->policy->admin(current_user());

    $u = Usuario::findOrFail($id);
    $u_copia = clone $u;

    if ($request->pass) {
      $u->password = hash('sha256', $request->input('pass'));
      $u->update();
    }

    if ($request->nombre) {
      $u->correo = $request->input('correo');
      $u->nombre = $request->input('nombre');
      $u->primer_apellido = $request->input('apellido_p');
      $u->segundo_apellido = $request->input('apellido_m');
      $u->tipo_usuario = $request->input('admin') == 1 ? 1 : 2;
      $u->id_sede = $request->input('sede');
      $u->user_app = $request->input('user_app') == 'si' ? true : false;
      $u->tipo_general = $request->input('rol');
      $u->super_admin = $request->input('super') == 1 ? true : false;

      if(!empty($request->file('image'))){
        $request->validate([
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $filename = time();
        $folder = 'public/assets/personal/';
        $u->img = ImportImage::save($request, 'image', $filename, $folder);
      }

      $u->update();

      AuditTraking::log($u, AuditTraking::TU, 'UsuarioController:update');
    }
    return back()->with('success','Se ha actualizado');
  }

  public function sedes($id) {
    $sedes = Sede::orderBy('nombre', 'asc')->get();
    $u = Usuario::findOrFail($id);
    $cargos = DetalleSedeUsuario::CARGO;

    foreach ($sedes as $key => $s) {
      $s->checked = false;
      foreach ($u->detalleSede as $keyR => $r) {
        if ($s->id == $r->id_sede && $r->activo) {
          $s->checked = true;
          $s->cargo = $r->cargo;
          break;
        }
      }
    }

    return view('admin.usuario.sedes', compact('u','sedes','cargos'));
  }

  public function sedesUpdate(Request $request, $id) {
    $u = Usuario::findOrFail($id);
    $detalleSede = DetalleSedeUsuario::where('id_usuario', $u->id)->where('id_sede',$request->input('sede_id'))->first();

    $activo = $request->input('activar') == 'si' ? true : false;
    $cargo = $request->input('cargo') ?? 0;

    if ($detalleSede) {
      $detalleSede->activo = $activo;
      $detalleSede->cargo = $cargo;
      $detalleSede->update();
    } else {
      $detalleSede = new DetalleSedeUsuario();
      $detalleSede->id_usuario = $u->id;
      $detalleSede->id_sede = $request->input('sede_id');
      $detalleSede->cargo = $cargo;
      $detalleSede->activo = $activo;
      $detalleSede->save();
    }

    if ($u->id == current_user()->id) {
      $sedesIds = DetalleSedeUsuario::where('cargo', '!=' ,0)->where('activo',true)->where('id_usuario',$u->id)->get()->pluck('id_sede');
      session(['gp_sedes_ids' => $sedesIds]);
    }

    return back()->with('success', 'Sedes actualizadas correctamente');
  }

  public function updateImg(Request $request, $id) {
    $u = Usuario::findOrFail($id);

    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $filename = $u->id . '' . time();
      $folder = 'public/assets/personal/';
      $u->img = ImportImage::save($request, 'image', $filename, $folder);
      $u->update();
    }
    return back()->with('success', 'Personal actualizado correctamente');
  }


  public function workspaces($id) {
    $u = Usuario::findOrFail($id);
    $detalleworkspaces = $u->detalleworkspaces;
    return view('admin.usuario.workspaces', compact('u','detalleworkspaces'));
  }


  public function sedes_asociadas($id) {
    $u = Usuario::findOrFail($id);

    $sedes = Sede::orderBy('nombre')->get();
    return view('admin.usuario.sedes', compact('u','sedes'));
  }
}
