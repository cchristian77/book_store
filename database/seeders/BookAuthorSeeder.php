<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use App\Models\BookAuthor;
use App\Models\BookGenre;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookAuthorSeeder extends Seeder
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
        $authors = Author::get()->pluck('id');

        for ($i = 0; $i < 15; $i++) {
            $bookGenre = new BookAuthor();
            $bookGenre->book_id = $faker->randomElement($books);
            $bookGenre->author_id = $faker->randomElement($authors);
            $bookGenre->save();
        }
    }
}
