<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // You may change the default password as needed
            'role' => $this->faker->randomElement(['1', '2']),
            'store_name' => $this->faker->optional()->company,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
