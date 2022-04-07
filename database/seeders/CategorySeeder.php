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
            ['id' => 1, 'title' => 'Audio', 'body' => "<p>Where words fail, music speaks. - Hans Christian Andersen</p>"],
            ['id' => 2, 'title' => 'Tech', 'body' => "<p>I'm sorry Dave, I'm afraid I can't do that.</p>"],
            ['id' => 3, 'title' => 'Games', 'body' => "<p>Reality is broken. Game designers can fix it. - Jane McGonigal</p>"],
            ['id' => 4, 'title' => 'Code', 'body' => "<p>The most damaging phrase in the language is... it's always been done this way. - Grace Hopper</p>"],
            ['id' => 5, 'title' => 'Life', 'body' => "<p>In order to write about life first you must live it. – Ernest Hemingway</p>"],
            ['id' => 99, 'title' => 'Uncategorized', 'body' => "<p>Lorem ipsum</p>"],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

//        Category::factory()
//            ->count(20)
//            ->create();


    }
}
