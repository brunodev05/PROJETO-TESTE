<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Bruno',
            'email' => 'cliente1@email.com',
            'password' => Hash::make('12345677'),
            'role' => 'client'
        ]);
    User::create([
        'name' => 'SUPORTE',
        'email' => 'atendente2@email.com',
        'password' => Hash::make('123456789'),
        'role' => 'agent'
    ]);
    }
}
