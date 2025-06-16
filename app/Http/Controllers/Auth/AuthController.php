<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tienda;
use App\Models\Usuario;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function index() {
    return view('auth.index');
  }

  public function registrar() {
    return view('auth.registro');
  }

  public function registrarStore(Request $request) {
    $clave = $request->input('clave');
    $tienda = $request->input('tienda');
    $dominio = strtolower($tienda);
    $dominio = preg_replace('/[^a-z0-9]/', '', $dominio);

    if ($clave == 'APA2025') {
      $correo = $request->input('correo');
      $u = Usuario::where('correo', $correo)->first();

      if ($u) {
        return back()->with('danger','No se puede crear cuenta');
      }

      $t = Tienda::where('dominio', $dominio)->first();

      if ($t) {
        return back()->with('danger','La tienda ya existe');
      }

      $u = new Usuario();
      $u->nombre = $request->input('nombre');
      $u->apellido = $request->input('apellido');
      $u->correo = $correo;
      $u->password = $request->input('password');
      $u->save();

      $t = new Tienda();
      $t->dominio = $dominio;
      $t->nombre = $tienda;
      $t->id_usuario = $u->id;
      $t->save();

      return redirect()->route('root')->with('success','Felicidades nueva cuenta creada');
    }
    return back()->with('danger','Error intente nuevamente');
  }

  public function login(Request $request){
    try {
      $u = Usuario::findByCorreo($request->correo)->firstOrFail();
      $pass = hash('sha256', $request->password);
      if($u->password==$pass){
        Auth::guard('usuario')->loginUsingId($u->id);

        $tienda = $u->tiendas->first();
        session()->put('current_tienda', $tienda);
        // session(['current_tienda', $u->tiendas->first()]);
        return redirect()->route('home.index');
      }
      return back()->with('error','Error intente nuevamente.');
    } catch (\Throwable $th) {
      return back()->with('error','Error. Intente nuevamente.');
    }
  }

  public function logout(){
    close_sessions();
    return redirect()->route('root');
  }
}
