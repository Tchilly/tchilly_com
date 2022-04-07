<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            ['id' => 1, 'title' => 'About', 'body' => '<p>Lorem ipsum</p>', 'template' => 'Page', 'user_id' => 1],
            ['id' => 2, 'title' => 'Support', 'body' => '<p>Lorem ipsum</p>', 'template' => 'Page', 'user_id' => 1],
            ['id' => 3, 'title' => 'Pricing', 'body' => '<p>Lorem ipsum</p>', 'template' => 'Page', 'user_id' => 1],
            ['id' => 4, 'title' => 'Documentation', 'body' => '<p>Lorem ipsum</p>', 'template' => 'Page', 'user_id' => 1],
            ['id' => 5, 'title' => 'Programming', 'body' => '<p>Lorem ipsum</p>', 'template' => 'Page', 'user_id' => 1],
            ['id' => 6, 'title' => 'Tutoring', 'body' => '<p>Lorem ipsum</p>', 'template' => 'Page', 'user_id' => 1],
            ['id' => 7, 'title' => 'Courses', 'body' => '<p>Lorem ipsum</p>', 'template' => 'Page', 'user_id' => 1],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }

    }
}
