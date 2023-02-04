<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_code','product_id','product_quanlity','created_at','updated_at'
    ];
    protected $primaryKey = 'order_details_id';
    protected $table = 'order_detail';

    
    public function order(){
        return $this->belongsTo('App\Models\Order','order_id','order_id');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id','product_id');
    }
}
