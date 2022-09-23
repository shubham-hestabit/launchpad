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

        DB::table('students')->insert([
            // 's_id'=>Str::random(10),
            'main_id'=>'2',
            'parent_details'=>Str::random(10)
        ]);

        DB::table('teachers')->insert([
            'main_id'=>'3',
            'experience'=>'4',
            'expertise_subjects'=>Str::random(10)
        ]);

        DB::table('admin')->insert([
            'a_name'=>$faker->name,
            'a_email'=>$faker->email,
            'a_password'=>$faker->password,
            'main_id'=>'2',
            'approval_status'=>'1'
        ]);

        DB::table('assign')->insert([
            'a_id'=>'2',
            'stud_id'=>'5',
            'assigned_teacher_id'=>'3'
        ]);
    }
}
