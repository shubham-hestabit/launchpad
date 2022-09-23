<?php

namespace Database\Seeders;

use Faker\Core\Number;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('students')->insert([
            // 's_id'=>Str::random(10),
            // 'main_id'=>'384734',
            'parent_details'=>Str::random(10)
        ]);

        // DB::table('teachers')->insert([
        //     // 'main_id'=>Str::random(10),
        //     'experience'=>Str::random(10),
        //     'expertise_subjects'=>Str::random(10)
        // ]);

        // DB::table('admin')->insert([
        //     'a_id'=>$faker->numerify,
        //     'a_name'=>$faker->name,
        //     'a_email'=>$faker->email,
        //     'a_password'=>$faker->password,
        //     'main_id'=>Str::random(10),
        //     'approval_status'=>Str::random(10)
        // ]);

        // DB::table('assign')->insert([
        //     // 'a_id'=>Str::random(10),
        //     'stud_id'=>Str::random(10),
        //     'assigned_teacher_id'=>Str::random(10)
        // ]);
    }
}
