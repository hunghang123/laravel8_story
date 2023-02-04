<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
        'shipping_name','shipping_address','shipping_phone','id',
        'matp','maqh','maxptt','shipping_default','created_at','updated_at'
    ];
    protected $primaryKey = 'shipping_id';
    protected $table = 'shipping';


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $timestamps = false;
}
