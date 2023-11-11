<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            "name" => "Slice of Life"
        ]);
        Genre::create([
            "name" => "Horror"
        ]);
        Genre::create([
            "name" => "Fantasy"
        ]);
        Genre::create([
            "name" => "Comedy"
        ]);
        Genre::create([
            "name" => "Spiritual"
        ]);
    }
}