<?php

namespace Database\Factories;

use App\Models\Entity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EntityFactory extends Factory
{
    protected $model = Entity::class;

    public function definition()
    {
        return [
            'api' => fake()->word(),
            'description' => fake()->sentence(),
            'link' => fake()->url(),
            'category_id' => 1,
        ];
    }
}
