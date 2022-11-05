<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 6; $i++) {
            $user = new User();
            if ($i === 0) {
                $user->username = 'admin';
                $user->first_name = 'Admin';
                $user->email = 'admin@example.com';
                $user->password = Hash::make('admin123');
                $user->role = 1;
            } else {
                $user->username = 'user_' . $i;
                $user->first_name = 'User' . $i;
                $user->email = 'user' . $i . '@example.com';
                $user->password = Hash::make('user123');
                $user->role = 0;
            }
            $user->middle_name = $faker->firstName;
            $user->last_name = $faker->lastName;
            $user->address = $faker->streetAddress;
            $user->place_of_birth = $faker->city;
            $user->date_of_birth = $faker->dateTimeThisCentury->format('Y-m-d');
            $user->phone_number = $faker->phoneNumber;

            if ($i % 2 === 0) {
                $user->gender = 'M';
            } else {
                $user->gender = 'F';
            }

            $user->save();
        }
    }
}
