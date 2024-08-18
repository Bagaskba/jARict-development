<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Batik;
use Illuminate\Support\Str;

class BatikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $batiks = [
            [
                'uuid_user' => '0450dff0-e8e7-405f-829f-47ad819525a9',
                'uuid_category' => '0120e8dc-8d97-42b0-bdf9-ac73924d6ca2',
                'catalog_picture' => 'batik.png',
                'name' => 'Batik Jaya',
                'product_url' => 'https://shoppe.co.id',
                'motive_picture' => 'batik.png',
            ],
        ];

        foreach ($batiks as $batik) {
            Batik::create([
                'uuid' => Str::uuid()->toString(),
                'uuid_user' => $batik['uuid_user'],
                'uuid_category' => $batik['uuid_category'],
                'catalog_picture' => $batik['catalog_picture'],
                'name' => $batik['name'],
                'product_url' => $batik['product_url'],
                'motive_picture' => $batik['motive_picture'],
            ]);
        }
    }
}
