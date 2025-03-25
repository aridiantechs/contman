<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractMedia extends Model
{
    protected $table="contract_media";

    protected $fillable=[
        "contract_id",
        "file",
        "orig_name"
    ];
    
    public function getFileAttribute($value)
    {
        if ($value) {
            if (strpos($value,'storage/uploads/contracts')) {
                return $value;
            } else {
                return (url('/').'/storage/uploads/contracts/' . $value);
            }
            
        }else{
            return '';
        }
    }

    public function contract()
    {
        return $this->belongsTo('App\Models\Contract','contract_id');
    }
}
