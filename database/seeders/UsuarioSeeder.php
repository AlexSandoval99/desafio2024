<?php

namespace Database\Seeders;

use App\Models\AdmPersona;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $personas = AdmPersona::all();

        foreach ($personas as $persona) {
            Usuario::create([
                'admin_persona_id' => $persona->id,
                'name' => $persona->nombre.' '.$persona->apellido,
                'email' => $persona->id.' '.$persona->nombre.'.'.$persona->apellido.'@example.com',
                'password' => bcrypt('password'), // Aquí deberías utilizar un faker para generar contraseñas seguras
                'activo' => rand(0, 1), // Aleatoriamente activo o no
                'bloqueado' => false, // Por defecto no bloqueado
            ]);
        }
    }
}
