<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;

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
        'is_spacial',
        'multi_img',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function storeProduct(array $data)
    {
        $images = [];

        if (isset($data['multi_img']) && is_array($data['multi_img'])) {
            foreach ($data['multi_img'] as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move('Products/image/', $name);
                $images[] = $name;
            }
        }

        $data['multi_img'] = implode('|', $images);

        return static::create($data);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
