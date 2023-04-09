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
            'pendidikan' => '[{"pendidikan":"S2","universitas":"Universitas Padjajaran","jurusan":"Teknik Informatika"},{"pendidikan":"S3","universitas":"Cambridge University","jurusan":"Mechanical"}]',
            'pekerjaan' => $this->faker->jobTitle,
            'perusahaan' => $this->faker->company,
            'jabatan' => $this->faker->jobTitle,
            'provinsi' => $this->faker->state,
            'kota' => $this->faker->city,
            'no_hp' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'user_id' => 2,
            'foto' => $this->faker->imageUrl(640, 480, 'people'),
            'approved' => 1,
        ];
    }
}
