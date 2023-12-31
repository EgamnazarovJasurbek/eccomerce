<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\BlogProduct;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function products(){

        return $this->hasMany(Product::class);
    }
    public function blogproducts(){

        return $this->hasMany(BlogProduct::class);
    }
}
