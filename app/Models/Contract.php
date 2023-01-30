<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable=[
        "order_id",
        "user_id",
        "user_address_id",
        "user_pm_id",
        "total_amount",
        "confirmed",
        'payment_obj'
    ];
    
    public function customer()
    {
        return $this->belongsTo('App\Models\User','customer_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    
    public function association()
    {
        return $this->belongsTo('App\Models\User','association_id');
    }
    
    public function vendor()
    {
        return $this->belongsTo('App\Models\User','vendor_id');
    }

    
    public function product_categories()
    {
        return $this->hasMany('App\Models\ContractProductCategory','contract_id');
    }

    public function order_items()
    {
        return $this->hasOne('App\Models\OrderItem','order_id');
    }

    // relation to user address
    public function user_address()
    {
        return $this->belongsTo('App\Models\Address','user_address_id');
    }

    //status
    public function statuss()
    {
        return $this->hasMany('App\Models\OrderStatus','order_id');
    }

    //latest status
    public function latest_status()
    {
        return $this->hasOne('App\Models\OrderStatus','order_id')->latest();
    }

    //latest status
    public function ratingg()
    {
        return $this->hasOne('App\Models\Rating','order_id','order_id');
    }
}
