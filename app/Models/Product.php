<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'product_name','product_desc','product_active','product_details','product_promotion','prodcut_quanlity','product_sold','product_price','product_imge','product_view','product_price_cost','category_id'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'product';

    public function danhmucsanpham()
    {
        return $this->belongsTo('App\Models\Category','category_id','category_id');
     }
}