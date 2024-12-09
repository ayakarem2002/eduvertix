<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('about_us')->insert([
            'title' => 'About Us Title',
            'description' => 'This is a description for the About Us section.',
            'image_1' => 'images/about/image1.jpg',
            'image_2' => 'images/about/image2.jpg',
            'video_1' => 'videos/about/video1.mp4',
            'numbers' => 123,
            'icon_1' => 'fas fa-info-circle',
            'desc_1' => 'This is a secondary description.',
            'video_2' => 'videos/about/video2.mp4',
            'title_2' => 'Secondary Title',
            'desc_2' => 'This is another secondary description.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
