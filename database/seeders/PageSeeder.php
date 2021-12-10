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
            ['id' => 1, 'title' => 'About', 'body' => '<p>Lorem ipsum</p>', 'template' => 'Page'],
            ['id' => 2, 'title' => 'Programming', 'body' => '<p>Lorem ipsum</p>', 'template' => 'Page'],
            ['id' => 3, 'title' => 'Audiophile', 'body' => '<p>Lorem ipsum</p>', 'template' => 'Page'],
            ['id' => 4, 'title' => 'Tech', 'body' => '<p>Lorem ipsum</p>', 'template' => 'Page'],
            ['id' => 5, 'title' => 'Support', 'body' => '<p>Lorem ipsum</p>', 'template' => 'Page'],
        ];

        foreach($pages as $page){
            Page::create($page);
        }

    }
}
