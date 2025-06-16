<?php

namespace App\Models;

use App\Presenters\TiendaPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Tienda extends Model
{
  use HasFactory;

  protected $table = 'tienda';

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'subdomain',
        'img',
        'nombre',
        'descripcion',
        'integrations',
        'info',
        'id_usuario',
        'activo',
    ];

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_tienda');
    }

  // protected function info(): Attribute {
  //   return Attribute::make(
  //       get: fn ($value) => json_decode($value, true),
  //       set: fn ($value) => json_encode($value),
  //   );
  // }

  // protected function config(): Attribute {
  //   return Attribute::make(
  //       get: fn ($value) => json_decode($value, true),
  //       set: fn ($value) => json_encode($value),
  //   );
  // }

  // public function getUpdate() {
  //   return $this->info['img'] ?? false;
  // }

  // public function getInfoTitle() {
  //   return $this->info['title'] ?? 'Plataforma';
  // }

  public function present(){
    return new TiendaPresenter($this);
  }

  // public function getConfigActiveWorkspace() {
  //   return $this->config['workspace_active'] ?? false;
  // }

  // public function getConfigActivePantalla() {
  //   return $this->config['pantalla_active'] ?? false;
  // }

  // public function getConfigActiveAse() {
  //   return $this->config['ase_active'] ?? false;
  // }

  // public function getConfigGoogle() {
  //   return $this->config['login_google'] ?? false;
  // }

  // public function getConfigLogin() {
  //   return $this->config['login_normal'] ?? false;
  // }

  // public function getConfigMail() {
  //   return $this->config['mail_demo'] ?? [];
  // }

  // public function getConfigMailDemoActive() {
  //   return $this->getConfigMail()['active'] ?? false;
  // }

  // public function getConfigMailDemoUser() {
  //   return $this->getConfigMail()['email'] ?? '';
  // }

  // public function getLoginPostulante() {
  //   return $this->config['login_postulante'] ?? true;
  // }
}
