<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'price' => 'decimal:2'
    ];

    // public function company(){
    //     return $this->belongsTo(Company::class);
    // }
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function product_category(){
        return $this->belongsTo(ProductCategory::class);
    }

    public function product_sub_category(){
        return $this->belongsTo(ProductSubCategory::class);
    }

    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }
}
