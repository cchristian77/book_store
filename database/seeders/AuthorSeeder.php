<?php

namespace Database\Seeders;

use App\Models\Author;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $author = new Author();
            $authorName = $faker->name();
            $author->name = $faker->name();
            $author->email = $faker->email;
            $author->address = $faker->streetAddress;
            $author->place_of_birth = $faker->city;
            $author->date_of_birth = $faker->dateTimeThisCentury->format('Y-m-d');
            $author->nationality = $faker->country;
            $author->about = 'I am the famous writer and the name is ' . $authorName;

            if ($i % 2 === 0) {
                $author->gender = 'M';
            } else {
                $author->gender = 'F';
            }

            $author->save();
        }
    }
}
