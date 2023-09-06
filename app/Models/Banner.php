<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'body_uz',
        'body_ru',
        'body_en',
        'image',
    ];
    use HasFactory;
}
