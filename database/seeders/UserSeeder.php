<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $uuid = Str::uuid()->toString();

        User::create([
            'uuid' => $uuid,
            'username' => 'admin',
            'email' => 'admin@jarictku.com',
            'password' => Hash::make('admin'),
            'role' => '1',
            'store_name' => null,
            'created_at' => now(),
        ]);

        User::create([
            'uuid' => $uuid,
            'username' => 'toko',
            'email' => 'toko@jarictku.com',
            'password' => Hash::make('toko'),
            'role' => '2',
            'store_name' => 'Batik Rejomulyo',
            'created_at' => now(),
        ]);
    }
}
