<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table= 'companies';
    protected $guarded = [];

    public function products(){
        // return $this->hasMany(Product::class)->limit(4);
        return $this->hasMany(Product::class);
    }
}
