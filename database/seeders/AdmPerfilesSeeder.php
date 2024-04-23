<?php

namespace Database\Seeders;

use App\Models\AdmPerfil;
use App\Models\AdmRol;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmPerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();
        $roles = AdmRol::all();
        $totalPerfilesCreados = 0;
        while ($totalPerfilesCreados < 18000) 
        {
            foreach ($users as $user) 
            {
                $numPerfiles = min(rand(1, 5), 18000 - $totalPerfilesCreados);
        
                for ($i = 0; $i < $numPerfiles; $i++) 
                {
                    $rol = $roles->random();
                    
                    AdmPerfil::create([
                        'adm_rol_id' => $rol->id,
                        'user_id' => $user->id,
                        'activo' => true,
                        'descripcion' => 'Perfil '.$rol->nombre.' de '.$user->name,
                    ]);
        
                    $totalPerfilesCreados++;
                }
        
                if ($totalPerfilesCreados >= 18000) 
                {
                    break 2; 
                }
            }
        }
    }
}
