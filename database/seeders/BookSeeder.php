<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++)
        {
            Book::create([
                'bookTitle' => 'Book ' . $i + 1,
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, perferendis nihil quibusdam alias distinctio, dicta modi, neque molestias veniam quae maxime. Vel eaque ullam eligendi neque repellendus facilis ipsa ut fugiat tenetur doloribus suscipit nisi cupiditate error incidunt, delectus itaque voluptatem unde? Aliquam vitae possimus quas eos maiores, perspiciatis modi dignissimos sit a distinctio odit alias ex adipisci consequuntur? Harum, officiis! Perspiciatis, suscipit exercitationem vero error laboriosam esse itaque id doloribus voluptas deserunt nesciunt at repellendus voluptatibus in quis consequatur fugit cumque dicta tempora magni qui vel! Nobis quae hic rerum minima dolorum dolorem possimus, nam iure, commodi nihil molestias',
                'author' => 'Author ' . $i + 1,
                'releaseDate' => Carbon::createFromDate(2023, 5, 13)->toDateTimeString(),
                'price' => rand(5000, 100000)
            ]);
        }
    }
}
