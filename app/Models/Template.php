<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    /* Available templates */
    public $templates = [
        //['name' => 'Blog'],
        ['name' => 'Page'],
        ['name' => 'PageAbout'],
        ['name' => 'PageContact'],
        ['name' => 'PageSupport'],
    ];

    /* Returns all templates */
    public function getTemplates()
    {
        return collect($this->templates);
    }
}
