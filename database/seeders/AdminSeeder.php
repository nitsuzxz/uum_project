<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'no_staf' => '00000001',
            'nama' => 'Admin',
            'email' => 'admin@um.com',
            'password' => Hash::make('admin'),
            'jawatan' => 'System Administrator',
            'jantina' => 'L',
            'no_telefon_mobil' => '0123456789',
            'no_telefon_pejabat' => '0323456789',
            'alamat_pejabat' => '',
            'is_admin' => true
        ]);
    }
}
