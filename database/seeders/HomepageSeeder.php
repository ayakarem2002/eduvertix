<?php

use Illuminate\Database\Seeder;
use App\Models\Homepage;

class HomepageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Homepage::create([
            'title' => 'Welcome to Our Website',
            'description' => 'This is a sample description for the homepage.',
            'image' => 'sample-image.jpg',
            'video_url' => 'https://example.com/sample-video.mp4',
        ]);
    }
}

