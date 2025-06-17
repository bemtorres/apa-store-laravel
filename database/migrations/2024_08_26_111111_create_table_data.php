<?php

use App\Models\Tienda;
use App\Models\Usuario;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $u = new Usuario();
      $u->nombre = "admin";
      $u->apellido = "admin";
      $u->admin = true;
      $u->correo = 'admin@apa.cl';
      $u->password = hash('sha256', '1234567890');
      $u->save();

      $t = new Tienda();
      $t->dominio = time();
      $t->nombre = "admin";
      $t->id_usuario = $u->id;
      $t->activo = false;
      $t->save();
    }

};
