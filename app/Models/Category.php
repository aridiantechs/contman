<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";

    public function company_services(){
        return $this->hasMany('App\Models\CompanyService','service','id');
    }
}
