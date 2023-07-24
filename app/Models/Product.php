<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'category_id',
        'title_uz',
        'title_en',
        'title_ru',
        'slug',
        'price',
        'desc_uz',
        'desc_en',
        'desc_ru',
        'image',
        'multi_img',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

}
