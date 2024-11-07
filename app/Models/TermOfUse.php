<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermOfUse extends Model
{
    use HasFactory;
    protected $table= 'term_of_use';
    protected $guarded = [];
}
