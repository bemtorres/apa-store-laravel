<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Tienda;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class APIServicesController extends Controller
{
  public function dominio($dominio)
  {
    try {
      $tienda = Tienda::where('dominio', $dominio)->firstOrFail();

      return response()->json($tienda->to_raw(),200);
      // return response()->json([
      //   'tienda'    => $tienda->nombre,
      //   'productos' => $data,
      // ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Error interno del servidor',
      ], 404);
    }
  }

  public function productos($dominio)
  {
    try {
      $tienda = Tienda::where('dominio', $dominio)->first();

      if (!$tienda) {
        return response()->json([
          'error' => 'Tienda no encontrada',
        ], 404);
      }

      $productos = $tienda->productos;

      $data = $productos->map(function ($producto) {
        return $producto->to_raw();
      });

      return response()->json($data,200);
      // return response()->json([
      //   'tienda'    => $tienda->nombre,
      //   'productos' => $data,
      // ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Error interno del servidor',
      ], 404);
    }
  }

  public function producto($dominio, $codigo)
  {
    try {
      $tienda = Tienda::where('dominio', $dominio)->first();

      if (!$tienda) {
        return response()->json([
          'error' => 'Tienda no encontrada',
        ], 404);
      }

      $p = Producto::where('id_tienda', $tienda->id)
        ->where('codigo', $codigo)
        ->firstOrFail();

      return response()->json($p->to_raw(), 200);
      // return response()->json([
      //   'tienda'   => $tienda->nombre,
      //   'producto' => $p->to_raw(),
      // ], 200);
    } catch (ModelNotFoundException $e) {
      return response()->json([
        'error' => 'Producto no encontrado',
      ], 404);
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Error interno del servidor',
      ], 500);
    }
  }
}
