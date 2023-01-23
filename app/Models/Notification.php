<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table="notifications";

    protected $casts = [
        'object' => 'array',
    ];
    
    protected $fillable=[
        'type',
        'to_user_id',
        'order_id',
        'title',
        'body',
        'object'
    ];
    
    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }

}
