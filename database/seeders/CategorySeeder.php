<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'sedan',
            'suv',
            'hatchback',
            'mpv',
            'sport',
            'convertible',
            'station wagon',
            'pickup',
            'listrik',
            'off road',
            'hybrid',
            'minibus',
            'lcgc',
            'bus',
            'cross over',
            'coupe',


        ];

        foreach ($data as $value) {
            Category::insert(['name' => $value]);
        }
    }
}
