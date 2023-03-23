<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded= ['id'];
    
    function rel_to_company(){
        return $this->belongsTo(Company::class,'company_id');
    }
}
