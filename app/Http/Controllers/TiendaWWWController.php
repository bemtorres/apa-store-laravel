<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Tienda;

class TiendaWWWController extends Controller
{
  public function index() {
    try {
      $tiendas = Tienda::get();
      return view('tienda.index', compact('tiendas'));
    } catch (\Throwable $th) {
      return redirect()->route('root')->with('danger','Tienda no existe');
    }
  }

  public function show($dominio) {
    try {
      $t = Tienda::with('productos')->where('dominio',$dominio)->firstOrFail();
      return view('tienda.show', compact('t'));
    } catch (\Throwable $th) {
      return redirect()->route('root')->with('danger','Tienda no existe');
    }
  }

  public function producto($dominio, $codigo) {
    try {
      $t = Tienda::where('dominio',$dominio)->firstOrFail();
      $p = Producto::where('id_tienda',$t->id)->where('codigo',$codigo)->firstOrFail();
      return view('tienda.producto', compact('t','p'));
    } catch (\Throwable $th) {
      return redirect()->route('root')->with('danger','Tienda no existe');
    }
  }
}
