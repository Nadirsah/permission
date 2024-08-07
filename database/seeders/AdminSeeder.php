<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::create([
        'name' => 'Prevail',
        'email' => 'prevail@example.com',
        'password' => Hash::make('password')
    ])->assignRole('writer','admin');
    }
}
