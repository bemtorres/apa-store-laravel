<?php

namespace App\Models;

use App\Services\Imagen;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Usuario extends Authenticatable
{
  use Notifiable;
  use HasFactory;

  protected $table = 'usuario';
  protected $guard = 'usuario';

  const TIPOS = [
    1 => 'admin',
    2 => 'normal',
  ];

  protected function info(): Attribute {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }

  protected function integrations(): Attribute {
    return Attribute::make(
        get: fn ($value) => json_decode($value, true),
        set: fn ($value) => json_encode($value),
    );
  }

  public function tiendas() {
      return $this->hasMany(Tienda::class, 'id_usuario');
  }

  public function articulos() {
      return $this->hasMany(Articulo::class, 'id_usuario');
  }

  public function scopefindByCorreo($query, $correo){
    return $query->where('correo',$correo);
  }

  function scopeFindCorreo($query, $correo) {
    return  $query->where('correo', $correo);
  }

  public function nombre_completo() {
    return $this->nombre . ' ' . $this->primer_apellido . ' ' . $this->segundo_apellido;
  }

  public function getImg() {
    if ($this->info_img()) {
      return asset($this->info_img());
    }

    return asset('template/img/people.png');
  }

  public function getPhoto(){
    $folder = "assets/personal";
    $folder_default = "template/img/";
    $imgDefault = $folder_default.'people.png';

    $img = $this->img;
    return (new Imagen($img, $folder, $imgDefault))->call();
  }

  public function getInfogSiderCollapse(){
    return $this->info['config_sidebar_collapse'] ?? false;
  }

  public function getInfoStyleKey(){
    return $this->info['style_key'] ?? null;
  }

  public function getInfoStyle(){
    return $this->info['style'] ?? null;
  }

  public function to_raw() {
    return [
      'id' => $this->id,
      'nombre' => $this->nombre,
      'run' => $this->run,
      'primer_apellido' => $this->primer_apellido ,
      'segundo_apellido' => $this->segundo_apellido,
      'nombre_completo' => $this->nombre_completo(),
      'correo' => $this->correo,
      'tipo_usuario' => $this->tipo_usuario == 1 ? 'admin' : 'normal',
      'sede' => $this->sede->nombre,
      'img' => $this->getImg(),
    ];
  }

  public function to_raw_bodega() {
    return [
      'id' => $this->id,
      'nombre' => $this->nombre,
      'run' => $this->run,
      'primer_apellido' => $this->primer_apellido ,
      'segundo_apellido' => $this->segundo_apellido,
      'nombre_completo' => $this->nombre_completo(),
      'correo' => $this->correo,
      'tipo_usuario' => $this->tipo_usuario == 1 ? 'admin' : 'normal',
      'img' => asset($this->getPhoto()),
    ];
  }
}
