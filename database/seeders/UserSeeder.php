<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        // for($a=1; $a <=15; $a++){
        //     User::create([
        //         "name" => $faker->name(),
        //         "username" => $faker->username(),
        //         "password"=> Hash::make("bagasedun1"),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
        // }
        // $users = 10;
        //     foreach($users as $user){
        //         User::create([
        //             // "name" => $faker->name(),
        //             "username" => $faker->unique()->username(15),
        //             "password"=> Hash::make("bagasedun1"),
        //             "role"=> Hash::make("bagasedun1"),
        //             'created_at' => Carbon::now(),
        //             'updated_at' => Carbon::now(),
        //         ]);
        //     }

    }
}
