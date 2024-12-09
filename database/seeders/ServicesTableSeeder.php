<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'title' => 'Web Development',
                'description' => 'We offer web development services to build custom websites for your business.',
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'We develop mobile applications for both Android and iOS platforms.',
            ],
            [
                'title' => 'SEO Services',
                'description' => 'We provide search engine optimization services to help your website rank higher on search engines.',
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Our digital marketing strategies help your business grow by reaching a wider audience online.',
            ],
            // Add more services as needed
        ]);
    }
}
