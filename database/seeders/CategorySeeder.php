<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'News',
                'description' => ''
            ],
            [
                'name' => 'Politics',
                'description' => ''
            ],
            [
                'name' => 'Sports',
                'description' => ''
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
