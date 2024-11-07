<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $guarded = [];

    public function seo() {
        return $this->belongsTo(Seo::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

}
