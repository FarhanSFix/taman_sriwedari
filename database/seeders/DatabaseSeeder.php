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
        $this->call([
            DokumenSeeder::class,
        ]);

        User::factory()->createMany([
    [
        'name' => 'dina',
        'email' => 'dina@gmail.com',
        'password' => Hash::make('timsriwedari'),
    ],
    [
        'name' => 'khilya',
        'email' => 'khilya@gmail.com',
        'password' => Hash::make('timsriwedari'),
    ],
    [
        'name' => 'iqbal',
        'email' => 'iqbal@gmail.com',
        'password' => Hash::make('timsriwedari'),
    ],
]);

    }
}
