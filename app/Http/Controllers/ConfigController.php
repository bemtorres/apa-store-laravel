<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

  public function index() {
    return view('admin.config.index');
  }

  public function zonaIndex() {
    return view('admin.config.zonas.index');
  }

  public function zonaCreate() {
    return view('admin.config.zonas.create');
  }

  public function zonaStore(Request $request) {
    $s = new Sede();
    $s->nombre = $request->input('nombre');

    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      ]);

      $filename = time();
      $folder = 'public/assets/zonas/';
      $s->img = ImportImage::save($request, 'image', $filename, $folder);
    }

    $s->activo = false;

    $s->save();
    return back()->with('success','Se ha creado correctamente');
  }

  public function zonaEdit($id) {
    $s = Sede::find($id);
    return view('admin.config.zonas.edit', compact('s'));
  }

  public function zonaUpdate(Request $request, $id) {
    $s = Sede::find($id);
    $s->nombre = $request->input('nombre');
    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      ]);

      $filename = time();
      $folder = 'public/assets/zonas/';
      $name = ImportImage::save($request, 'image', $filename, $folder);

      $s->img = $folder . $name;
    }

    $s->update();
    return back()->with('success','Se ha actualizado');
  }
}
