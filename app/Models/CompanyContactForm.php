<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyContactForm extends Model
{
    use HasFactory;

    protected $table = 'company_contact_form';
    protected $guarded = [];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
