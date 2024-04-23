<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llama a tus seeders uno por uno
        // $this->call(AdmRoleSeeder::class);
        // $this->call(AdmPersonaSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(AdmDocumentoSeeder::class);
        $this->call(AdmPerfilesSeeder::class);
    }
}
