<?php

namespace App\Http\Controllers\API\Backend;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class APIRegionController extends Controller
{
  public function comunas(Request $request, $id_region) {
    $region = Region::find($id_region);
    $comunas = $region->comunas;

    return Response()->json([
      'message' => 'Se ha encontrado correctamente',
      'data' => $comunas
    ], 200);
  }
}
