<?php

namespace Database\Factories;

use App\Models\Batik;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BatikFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Batik::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'uuid_user' => \App\Models\User::factory(),
            'uuid_category' => \App\Models\Category::factory(),
            'catalog_picture' => $this->faker->imageUrl(),
            'name' => $this->faker->words(3, true),
            'product_url' => $this->faker->url,
            'motive_picture' => $this->faker->imageUrl(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
