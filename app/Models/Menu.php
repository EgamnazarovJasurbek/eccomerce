<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
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

}
