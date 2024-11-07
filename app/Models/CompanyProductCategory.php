<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProductCategory extends Model
{
    use HasFactory;
    protected $table= 'company_product_categories';
    protected $guarded = [];

    protected $appends =['product_category_name'];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function product_category(){
        return $this->belongsTo(ProductCategory::class);
    }

    public function getProductCategoryNameAttribute(){
        return $this->product_category->name;
    }
}
