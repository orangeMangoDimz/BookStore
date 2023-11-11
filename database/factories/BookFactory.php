<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Genre;

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
    $publisherIds = Publisher::pluck('id')->toArray();
    $authorIds = Author::pluck('id')->toArray();
    $genreIds = Genre::pluck('id')->toArray();

    // Generate paragraph
    $randParagraph = rand(2, 5);
    $paragraph = [];
    for ($i = 0; $i < $randParagraph; $i++){
         array_push($paragraph, fake()->paragraph(rand(15, 20)));
    }

    return [
            'image' => '',
            'bookTitle' => fake()->title(),
            'author_id' => fake()->randomElement($authorIds),
            'genre_id' => fake()->randomElement($genreIds),
            'publisher_id' => fake()->randomElement($publisherIds),
            'description' => json_encode($paragraph),
            'releaseDate' => Carbon::createFromDate(2023, 5, 13)->toDateTimeString(),
            'price' => rand(5000, 100000)
        ];
    }
}