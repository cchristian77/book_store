<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 4; $i++) {
            $publisher = new Publisher();

            if ($i === 0) {
                $publisher->company_name = 'Gramedia';
            } else {
                $publisher->company_name = $faker->company;
            }
            $publisher->address = $faker->streetAddress;
            $publisher->phone_number = $faker->phoneNumber;
            $publisher->save();
        }
    }
}
