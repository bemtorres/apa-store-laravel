<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Services\Style;
use Illuminate\Http\Request;

// use App\Http\Requests\AuthLoginRequest as AuthRequest;

class HomeController extends Controller
{
  public function index() {
    $t = current_tienda();

    $productos_count = Producto::where('id_tienda', $t->id)->count();

    return view('home.index',compact('productos_count'));
  }

  public function perfil() {
    $u = current_user();
    $styles = Style::LIST;
    return view('admin.perfil',compact('u','styles'));
  }

  public function perfilUpdate(Request $request) {
    $u = current_user();
    $block = $request->input('block');

    if ($block == 'user') {
      $u->nombre = $request->input('nombre');
      $u->apellido = $request->input('apellido');
      $u->update();
    } elseif ($block == 'pass') {
      if ($request->pass) {
        $u->password = hash('sha256', $request->input('pass'));
        $u->update();
      }
    } elseif ($block == 'style') {
      if ($request->style) {
        $info = $u->info;
        $info['style_key'] = $request->input('style');
        $info['style'] = 'template/css/styles/'.$info['style_key'].'.css';
        $u->info = $info;
        $u->update();
      }
    }
    return back()->with('success','Se ha actualizado');
  }

  public function collapse() {
    try {
      $usuario = current_user();
      $info = $usuario->info;
      $info['config_sidebar_collapse'] = !$usuario->getInfogSiderCollapse();
      $usuario->info = $info;
      $usuario->update();
      return response()->json(['save' => 'ok'], 200);
    } catch (\Throwable $th) {
      return response()->json(['save' => 'error'], 404);
    }
  }
}
