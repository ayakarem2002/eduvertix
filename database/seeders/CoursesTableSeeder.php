<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'icon_1' => 'path/to/icon1.png', // Replace with the actual icon path
                'title_1' => 'Course 1 Title',
                'desc_1' => 'This is the description for course 1.',
            ],
            [
                'icon_1' => 'path/to/icon2.png', // Replace with the actual icon path
                'title_1' => 'Course 2 Title',
                'desc_1' => 'This is the description for course 2.',
            ],
            [
                'icon_1' => 'path/to/icon3.png', // Replace with the actual icon path
                'title_1' => 'Course 3 Title',
                'desc_1' => 'This is the description for course 3.',
            ],
            // Add more courses as needed
        ]);
    }
}
