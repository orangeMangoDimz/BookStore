<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Genre;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    $userIds = User::pluck('id')->toArray();
    $genreIds = Genre::pluck('id')->toArray();

    // Generate paragraph
    $randParagraph = rand(2, 5);
    $paragraph = [];
    for ($i = 0; $i < $randParagraph; $i++){
         array_push($paragraph, fake()->paragraph(rand(15, 20)));
    }

    return [
            'image' => '',
            'title' => fake()->title(),
            'user_id' => fake()->randomElement($userIds),
            'genre_id' => fake()->randomElement($genreIds),
            'description' => json_encode($paragraph),
            'releaseDate' => Carbon::createFromDate(2023, 5, 13)->toDateTimeString(),
            'price' => rand(5000, 100000)
        ];
    }
}