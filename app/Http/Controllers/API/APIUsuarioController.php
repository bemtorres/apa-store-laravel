<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class APIUsuarioController extends Controller
{
  public function buscarUsuario(Request $request) {
    $busqueda = $request->input('dato');

    $usuarios = Usuario::where(function($query) use ($busqueda) {
      $query->where('correo', 'like', "%$busqueda%")
            ->orWhere('nombre', 'like', "%$busqueda%")
            ->orWhere('rut', 'like', "%$busqueda%");
    })->get();


    $usuariosEnRaw = $usuarios->map(function($usuario) {
      return $usuario->to_raw();
    });


    return response()->json([
      'message' => 'Se ha encontrado correctamente',
      'usuarios' => $usuariosEnRaw
    ] , 200);
  }
}
