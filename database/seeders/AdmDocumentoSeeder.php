<?php

namespace Database\Seeders;

use App\Models\AdmDocumento;
use App\Models\AdmPersona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $personas = AdmPersona::all();

        foreach ($personas as $persona) {
            AdmDocumento::create([
                'adm_persona_id' => $persona->id,
                'numero' => 'Documento principal de '.$persona->nombre.' '.$persona->apellido,
                'es_principal' => true,
            ]);
            if($persona->id % 2 != 0)
            {
                $i = 2;
                    AdmDocumento::create([
                        'adm_persona_id' => $persona->id,
                        'numero' => 'Documento '.$i.' de '.$persona->nombre.' '.$persona->apellido,
                        'es_principal' => false,
                    ]);
            }
        }
    }
}
