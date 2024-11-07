<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_categories';


    protected $guarded = [];

    public function product_sub_category(){
        return $this->hasMany(ProductSubCategory::class, 'category_id', 'id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'product_category_id', 'id');
    }
}
