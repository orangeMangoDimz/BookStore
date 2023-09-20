<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++)
        {
            Publisher::create([
                'name' => $faker->userName(),
                'description' => $faker->sentence(3),
                'address' => $faker->address(),
                'email' => $faker->email()
            ]);
        }
    }
}
