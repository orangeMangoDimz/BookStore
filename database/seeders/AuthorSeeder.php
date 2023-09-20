<?php

namespace Database\Seeders;

use App\Models\Author;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 3; $i++)
        {
            Author::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => $faker->password(),
                'description' => $faker->sentence(50)
            ]);
        }
    }
}
