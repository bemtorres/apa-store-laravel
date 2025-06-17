<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Tienda;
use Illuminate\Http\Request;

class TiendasController extends Controller
{
  public function index() {
    if(!current_user()->admin) {
      abort(403);
    }
    // $t = current_tienda();
    $tiendas = Tienda::get();
    return view('admin.tiendas.index', compact('tiendas'));
  }

  public function show($dominio) {
    // $t = current_tienda();
    if(!current_user()->admin) {
      abort(403);
    }
    $t = Tienda::with('productos')->where('dominio',$dominio)->firstOrFail();
    $productos = $t->productos;
    return view('admin.tiendas.show', compact('t','productos'));
  }

  public function update(Request $request, $dominio) {
    if(!current_user()->admin) {
      abort(403);
    }
    $t = Tienda::where('dominio',$dominio)->firstOrFail();

    $block = $request->input('block');

    if ($block == "producto") {
      $p = Producto::where('id_tienda', $t->id)->findOrFail($request->input('id'));
      $p->activo = !$p->activo;
      $p->update();
    } else {
      $t->activo = !$t->activo;
      $t->update();
    }

    return back()->with('success','Se ha creado correctamente');
  }

}
