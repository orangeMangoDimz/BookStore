<?php

namespace Database\Seeders;

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
        for ($i = 0; $i < 10; $i++)
        {
            Book::create([
                'bookTitle' => $faker->title(),
                'publisher_id' => $faker->randomElement($publisherIds),
                'description' => $faker->paragraph(),
                'releaseDate' => Carbon::createFromDate(2023, 5, 13)->toDateTimeString(),
                'price' => rand(5000, 100000)
            ]);
        }
    }
}
