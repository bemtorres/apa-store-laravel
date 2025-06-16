<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
  public function index() {
    $t = current_tienda();

    $productos = Producto::where('id_tienda', $t->id)->get();
    return view('admin.producto.index', compact('productos'));
  }

  public function create() {
    return view('admin.producto.create');
  }

  public function edit($id) {
    $t = current_tienda();
    $p = Producto::where('id_tienda', $t->id)->where('idi', $id)->first();
    return view('admin.producto.edit', compact('p'));
  }

  public function store(Request $request) {
    $t = current_tienda();

    $p = new Producto();
    $p->idi = time();
    $p->codigo = $request->input('codigo');
    $p->nombre = $request->input('nombre');
    $p->descripcion = $request->input('descripcion');
    $p->precio = $request->input('precio');
    $p->id_usuario = current_user()->id;
    $p->id_tienda = $t->id;
    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      ]);

      $filename = time() . random_int(1, 9999);
      $folder = 'public/assets/tienda/';
      $p->img = ImportImage::save($request, 'image', $filename, $folder);
    }
    $p->save();

    return redirect()->route('admin.producto.index')->with('success','Se ha creado correctamente');
  }

  public function update(Request $request, $idi) {
    $t = current_tienda();
    $p = Producto::where('idi',$idi)->where('id_tienda', $t->id)->firstOrFail();
    // $request->validate([
    //   'codigo' => 'required|string|max:255|unique:productos,codigo,' . $p->id . ',id,id_tienda,' . $t->id,
    //   'nombre' => 'required|string|max:255',
    //   'precio' => 'required|numeric|min:0',
    //   'image'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    // ]);
    // $p->idi = time();
    $p->codigo = $request->input('codigo');
    $p->nombre = $request->input('nombre');
    $p->descripcion = $request->input('descripcion');
    $p->precio = $request->input('precio');
    // $p->id_usuario = current_user()->id;
    // $p->id_tienda = $t->id;
    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      ]);

      $filename = time() . random_int(1, 9999);
      $folder = 'public/assets/tienda/';
      $p->img = ImportImage::save($request, 'image', $filename, $folder);
    }
    $p->update();
    return back()->with('success','Se ha creado correctamente');
  }

}
