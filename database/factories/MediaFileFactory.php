<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MediaFile>
 */
class MediaFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'     => $this->faker->numberBetween(1, 50),
            'category_id' => Categorie::inRandomOrder()->first()?->id ?? Categorie::factory(),
            'title'       => $this->faker->text(55),
            'description' => $this->faker->text(100),
            'tags'        => implode(';', $this->faker->words($this->faker->numberBetween(2, 5))),
            'size'        => $this->faker->numberBetween(1, 500) * 1024 * 1024, // en bytes
            'path'        => $this->faker->imageUrl(),
            'status'      => $this->faker->randomElement([1, 0])
        ];
    }
}
