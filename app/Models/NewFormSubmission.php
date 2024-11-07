<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewFormSubmission extends Model
{
    use HasFactory;
    protected $table = 'new_form_submissions';
    protected $guarded = [];
}
