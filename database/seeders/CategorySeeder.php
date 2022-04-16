<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            ['id' => 1, 'title' => 'Audio', 'body' => "Where words fail, music speaks. - Hans Christian Andersen"],
            ['id' => 2, 'title' => 'Tech', 'body' => "I'm sorry Dave, I'm afraid I can't do that."],
            ['id' => 3, 'title' => 'Games', 'body' => "Reality is broken. Game designers can fix it. - Jane McGonigal"],
            ['id' => 4, 'title' => 'Code', 'body' => "The most damaging phrase in the language is... it's always been done this way. - Grace Hopper"],
            ['id' => 5, 'title' => 'Life', 'body' => "In order to write about life first you must live it. – Ernest Hemingway"],
            ['id' => 99, 'title' => 'Uncategorized', 'body' => "Lorem ipsum"],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

//        Category::factory()
//            ->count(20)
//            ->create();


    }
}
