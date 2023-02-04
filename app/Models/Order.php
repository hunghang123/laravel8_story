<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'shipping_id','id','order_code','order_status','order_coupon','order_feeship','created_at','updated_at','order_date'
    ];
    protected $primaryKey = 'order_id';
    protected $table = 'order';
    
    public function shipping(){
        return $this->belongsTo('App\Models\Shipping','shipping_id','shipping_id');
    }
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
   



    public $timestamps = false;
   
}
