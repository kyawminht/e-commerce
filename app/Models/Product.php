<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = [
        'category_id', // Add this line
        'name',
        'slug',
        'brand',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'small_description',
        'description',
        'meta_title',
        'meta_keyword',
        'meta_description',
        // Add more fields as needed
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
}
