<?php

namespace App\Models;

use App\Presenters\ProductoPresenter;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Casts\Attribute;



class Producto extends Model
{
  use HasFactory;

  protected $table = 'producto';

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

  public function present(){
    return new ProductoPresenter($this);
  }

  public function getPrecio() {
    return (new Currency())->getConvert($this->precio);
  }

  public function to_raw() {
    return [
      'id' => $this->idi,
      'codigo' => $this->codigo,
      'nombre' => $this->nombre,
      'descripcion' => $this->descripcion,
      'precio' => $this->precio,
      'precio_text' => $this->getPrecio(),
      'url' => route('api.services.productos.show',[$this->tienda->dominio, $this->codigo])
    ];
  }
}
