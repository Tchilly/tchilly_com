<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    public $templates = [
        ['name' => 'Blog'],
        ['name' => 'Page']
    ];

    public function getTemplates()
    {
        return collect($this->templates);
    }
}
