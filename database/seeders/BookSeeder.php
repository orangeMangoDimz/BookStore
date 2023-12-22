<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageName = ["book-1.png", "book-2.png", "book-3.png", "book-4.png", "book-5.png", "book-6.png", "book-7.png", "book-8.png", "book-9.png", "book-10.png", "book-11.png", "book-12.png", "book-13.png", "book-14.png", "book-15.png"];
        $authorName = ["EMPEROR EMPRESS", "ANESKA (Completed√)", "Queen of the Night (Witchfire 1)", "Underground", "Rejected Revenge", "God Gave Me You", "His Darkest Side", "Hello, Ex-Husband!", "NOIR", "Empress Transmigration", "Rebel Prince", "My Beautiful Mate", "The Mystical World", "Queen Of Storm", "FALLING for The BEAST"];

        for ($i = 0; $i < 15; $i++){
            Storage::put("public/images/" . $imageName[$i], file_get_contents(public_path("images/bookCover/" . $imageName[$i])));
            Book::factory()->create([
                "image" => $imageName[$i],
                "bookTitle" => $authorName[$i]
            ]);
        }
    }
}