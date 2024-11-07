<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;
    protected $table = 'product_sub_categories';
    protected $guarded = [];

    public function product_category(){
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }
}
