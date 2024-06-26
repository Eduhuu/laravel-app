<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => 1,
            'name' => 'Eduardo',
            'lastname' => 'Suarez',
            'email' => 'eduardosuarez.c97@gmail.com',
            'password' =>  Hash::make("abcd1234$"),
            'rol' => 'admin',
            'img' => '/',
            'blocked' => false,
        ]);
    }
}
