<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('main')->insert([
            'name'=>$faker->name,
            'email'=>$faker->email,
            'address'=>$faker->address,
            'profile_picture'=>Str::random(10),
            'current_school'=>Str::random(10),
            'previous_school'=>Str::random(10),
            'password'=>$faker->password
        ]);
    }
}
