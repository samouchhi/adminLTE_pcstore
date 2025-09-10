<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];
    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'categories_product');
    }
}
