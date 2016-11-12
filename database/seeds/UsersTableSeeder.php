<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        [
          'tipo_usuario'=>'Administrador',
          'estado'=>'Activo',
          'nombres'=>'José',
          'apellidos'=>'Kcomt',
          'dni'=>'70488170',
          'fecha_nacimiento'=>'1993-01-12',
          'telefono'=>'961673915',
          'direccion'=>'cajamarca 440',
          'email'=>'jkcomt@gmail.com',
          'password'=>bcrypt('admin1234'),
          'niveles_id'=>'1',
        ]);
    }
}
