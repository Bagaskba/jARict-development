<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $uuid = Str::uuid()->toString();

        Category::create([
            'uuid' => $uuid,
            'name' => 'Batik Semarang',
            'description' => 'batik yang diproduksi oleh orang atau warga Kota Semarang, di Kota Semarang, dengan motif atau ikon-ikon Kota Semarang.',
            'created_at' => now(),
        ]);

        Category::create([
            'uuid' => $uuid,
            'name' => 'Batik Solo',
            'description' => 'Batik Solo adalah kain batik yang berasal dari Solo atau Surakarta, Jawa Tengah.',
            'created_at' => now(),
        ]);
    }
}
