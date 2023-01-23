<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractMedia extends Model
{
    protected $table="contract_media";

    protected $fillable=[
        "contract_id",
        "file",
    ];
    
    public function getFileAttribute($value)
    {
        return $value ? (url('/').'/public/storage/uploads/contract/' . $value) : "";
    }

    public function contract()
    {
        return $this->belongsTo('App\Models\Contract','contract_id');
    }
}
