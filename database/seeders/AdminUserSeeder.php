<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@smansa.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'is_admin' => true,
            'foto' => 'default.png',
        ]);
    }
}