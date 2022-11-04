<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use App\Models\BookGenre;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $books = Book::get()->pluck('id');
        $genres = Genre::get()->pluck('id');

        for ($i = 0; $i < 15; $i++) {
            $bookGenre = new BookGenre();
            $bookGenre->book_id = $faker->randomElement($books);
            $bookGenre->genre_id = $faker->randomElement($genres);
            $bookGenre->save();
        }
    }
}
