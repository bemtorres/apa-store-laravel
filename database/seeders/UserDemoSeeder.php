<?php

namespace Database\Seeders;

use App\Models\Tienda;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UserDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $pass = hash('sha256', 123456);

      $u = new Usuario();
      $u->nombre = 'Benjamin';
      $u->apellido = 'Mora';
      $u->correo = 'benja.mora.torres@gmail.com';
      $u->password = $pass;
      $u->admin = true;
      $u->save();

      $t = new Tienda();
      $t->dominio = 'apa';
      $t->nombre = 'apa';
      $t->id_usuario = $u->id;
      $t->activo = true;
      $t->save();
    }
}
