<?php

namespace Database\Seeders;

use App\Models\Daftar;
use App\Models\Pasien;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Poli::factory()->create([
            'nama' => 'Umum',
        ]);

        Poli::factory()->create([
            'nama' => 'Gigi',
        ]);

        Poli::factory()->create([
            'nama' => 'Mata',
        ]);

        Poli::factory()->create([
            'nama' => 'Anak',
        ]);

        Poli::factory()->create([
            'nama' => 'Kandungan',
        ]);

        Pasien::factory(20)->create();
        Daftar::factory(20)->create();
    }
}
