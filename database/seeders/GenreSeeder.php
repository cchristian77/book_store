<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::insert([
            [
                'name' => 'Comedy',
            ],
            [
                'name' => 'Romantic',
            ],
            [
                'name' => 'Action',
            ],
            [
                'name' => 'Mystery',
            ],
            [
                'name' => 'Thriller',
            ],
            [
                'name' => 'Fantasy',
            ],
            [
                'name' => 'Sci-Fi',
            ],
            [
                'name' => 'Horror',
            ],
        ]);
    }
}
