<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Tag extends Model
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
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
