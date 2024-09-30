<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'title' => $this->faker->sentence(),
            'tags' => 'pop, r&b, hiphop',
            'organizer' => $this->faker->name(),
            'email' => $this->faker->companyEmail(),
            'artist' => $this->faker->name(),
            'location' => $this->faker->city(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'description' => $this->faker->paragraph(5),
        ];
    }
}
