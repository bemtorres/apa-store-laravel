<?php

namespace App\Models;

use App\Presenters\ArticuloPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Producto extends Model
{
  use HasFactory;

  protected $table = 'articulo';

  // Definir los campos que pueden ser asignados masivamente
  protected $fillable = [
    'idi',
    'codigo',
    'nombre',
    'descripcion',
    'img',
    'precio',
    'id_usuario',
    'id_tienda',
    'activo',
  ];

  // Relación con Usuario
  public function usuario()
  {
    return $this->belongsTo(Usuario::class, 'id_usuario');
  }

  // Relación con Tienda
  public function tienda()
  {
    return $this->belongsTo(Tienda::class, 'id_tienda');
  }
}
