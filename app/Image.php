<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public const VALIDATOR = [
        'name' => 'required|max:255',
        'file' => 'required|image',
    ];
}
