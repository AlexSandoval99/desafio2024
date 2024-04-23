<?php

namespace Database\Seeders;

use App\Models\AdmRol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            AdmRol::create([
                'nombre' => 'Rol '.$i,
                'codigo' => 'ROL'.$i,
                'activo' => true,
            ]);
        }
    }
}
