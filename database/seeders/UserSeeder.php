<?php

namespace Database\Seeders;

use App\Models\Resident;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Admin SiDesa',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'status' => 'approved',
            'role_id' => '1'
        ]);

        User::create([
            'id' => 2,
            'name' => 'Penduduk1',
            'email' => 'penduduk1@gmail.com',
            'password' => 'penduduk1',
            'status' => 'approved',
            'role_id' => '2',
        ]);


        Resident::create([
            'user_id' => 2,
            'nik' => '123456789009812',
            'name' => 'fauzan',
            'gender' => 'male',
            'birth_date' => '2000-05-05',
            'birth_place' => 'padang',
            'address' => 'jl gajah mada',
            'marital_status' => 'single',
        ]);
    }
}
