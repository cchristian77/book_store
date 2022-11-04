<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Publisher;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $publishers = Publisher::get()->pluck('id');

        for ($i = 0; $i < 10; $i++) {
            $book = new Book();
            $book->title = ucwords($faker->catchPhrase());
            $book->price = $faker->randomNumber(5, true);
            $book->release_date = $faker->dateTimeThisCentury->format('Y-m-d');
            $book->is_published = $faker->numberBetween(0, 1);;
            $book->page = $faker->randomNumber(3);
            $book->synopsis = $faker->paragraph(2);
            $book->publisher_id = $faker->randomElement($publishers);
            $book->save();
        }
    }
}
