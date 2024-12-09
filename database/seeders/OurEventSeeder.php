<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('our_events')->insert([
        [
            'title' => 'Mobile App Development',
            'description' => 'We develop mobile applications for both Android and iOS platforms.',
        ],
    
        ]);
    }
}
