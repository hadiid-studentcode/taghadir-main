<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt('password'),
            'role' => 'admin'
        ]);

        User::factory()->create([
            'username' => 'guru',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'guru'
        ]);

        

        Guru::factory()->create([
            'nama' => 'Hadiid Andri Yulison',
            'nip' => '123456789',
            'bidang_studi' => 'Sistem Informasi',
            'user_id' => 2
        ]);
        
    }
}
