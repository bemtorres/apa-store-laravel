<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
  public function index() {
    $t = current_tienda();
    return view('admin.tienda.index', compact('t'));
  }

  public function update(Request $request) {
    $t = current_tienda();
    $block = $request->input('block');

    if ($block == 'wsp') {
      $info = $t->info;
      $info['wsp'] = $request->input('telefono');
      $t->info = $info;
      $t->update();
      session()->put('current_tienda', $t);
      return back()->with('success','Se ha actualizado correctamente');
    }

    $t->nombre = $request->input('nombre');
    $t->descripcion = $request->input('descripcion');
    $info = $t->info;
    $info['color_fondo'] = $request->input('color_fondo');
    // $info['color_texto'] = $request->input('color_texto');
    $t->info = $info;

    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      ]);

      $filename = time() . random_int(1, 9999) . 'imagen';
      $folder = 'public/assets/tienda/';
      $t->img = ImportImage::save($request, 'image', $filename, $folder);
    }

    if(!empty($request->file('icon'))){
      $request->validate([
        'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      ]);

      $filename = time() . random_int(1, 9999) . 'icon';
      $folder = 'public/assets/tienda/';
      $t->icon = ImportImage::save($request, 'icon', $filename, $folder);
    }
    $t->update();
    return back()->with('success','Se ha creado correctamente');
  }

}
