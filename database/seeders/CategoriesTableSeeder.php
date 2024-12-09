<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'Electronics',
                'icon' => 'fa-solid fa-tv',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fashion',
                'icon' => 'fa-solid fa-tshirt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Books',
                'icon' => 'fa-solid fa-book',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
