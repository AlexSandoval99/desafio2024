<?php

namespace Database\Seeders;

use App\Models\AdmPersona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class AdmPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10000; $i++) {
            AdmPersona::create([
                'nombre' => $faker->firstName,
                'apellido' => $faker->lastName,
                'sexo' => $faker->randomElement(['M', 'F']),
                'fech_nacimiento' => $faker->date(),
            ]);
        }
    }
}
