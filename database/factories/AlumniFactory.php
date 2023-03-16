<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlumniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_lengkap' => $this->faker->name,
            'tahun_lulus' => $this->faker->year,
            'kelas' => $this->faker->randomElement(['X', 'XI', 'XII']),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date,
            'teman_sebangku' => $this->faker->name,
            'alamat' => $this->faker->address,
            'jenkel' => 'male',
            'ukuran_baju' => 'S',
            'pendidikan_terakhir' => 'SMA',
            'universitas' => $this->faker->company,
            'jurusan' => $this->faker->jobTitle,
            'pekerjaan' => $this->faker->jobTitle,
            'no_hp' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'foto' => $this->faker->imageUrl(640, 480, 'people'),
            'approved' => 1,
        ];
    }
}
