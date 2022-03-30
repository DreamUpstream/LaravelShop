<?php

namespace App\Models\Products;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['url'];

    protected $casts = ['description' => 'array'];

    protected $fillable = [
        'is_active', 'category_id', 'name', 'description', 'image', 'product_brand', 'product_rating', 'SKU', 'price'
    ];

    public function getUrlAttribute() {
        $name =  Str::slug($this->name, '-');
        return route("products.show", [$name, $this->id]);
    }
}
