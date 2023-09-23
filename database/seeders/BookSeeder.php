<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $publisherIds = Publisher::pluck('id')->toArray();
        $authorIds = Author::pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++)
        {
            Book::create([
                'image' => '',
                'bookTitle' => $faker->title(),
                'author_id' => $faker->randomElement($authorIds),
                'publisher_id' => $faker->randomElement($publisherIds),
                'description' => $faker->paragraph(50),
                'releaseDate' => Carbon::createFromDate(2023, 5, 13)->toDateTimeString(),
                'price' => rand(5000, 100000)
            ]);
        }
    }
}
