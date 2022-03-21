<?php

namespace App\Models\Products;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['url'];

    public function getUrlAttribute() {
        $name =  Str::slug($this->name, '-');
        return route("products.show", [$name, $this->id]);
    }
}
