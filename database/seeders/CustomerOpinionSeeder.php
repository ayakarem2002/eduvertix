<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomerOpinionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customer_opinions')->insert([
            [
                'title' => 'Excellent Service',
                'description' => 'The team was highly professional and responsive.',
                'image' => 'images/customer1.jpg',
                'name' => 'John Doe',
                'job_title' => 'Software Engineer',
                'opinion' => 'I had a fantastic experience with their service. Highly recommend!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Outstanding Support',
                'description' => 'They went above and beyond to assist us.',
                'image' => 'images/customer2.jpg',
                'name' => 'Jane Smith',
                'job_title' => 'Project Manager',
                'opinion' => 'Their attention to detail and support is unmatched. Great job!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
