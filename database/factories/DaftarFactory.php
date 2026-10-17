<?php

namespace Database\Factories;

use App\Models\Pasien;
use App\Models\Poli;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Daftar>
 */
class DaftarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $availablePasienIds = Pasien::pluck('id')->toArray();
        $availablePoliIds = Poli::pluck('id')->toArray();

        return [
            'pasien_id' => $this->faker->randomElement($availablePasienIds),
            'poli_id' => $this->faker->randomElement($availablePoliIds),
            'tanggal_daftar' => $this->faker->date(),
            'keluhan' => $this->faker->sentence(),
            'diagnosis' => $this->faker->sentence(),
            'tindakan' => $this->faker->sentence(),
        ];
    }
}
