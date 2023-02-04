<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistical extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_date','sales','profit','quantity','total_order'
     ];
     protected $primaryKey = 'id_statistical';
     protected $table = 'statistical';

     const CREATED_AT = 'created_at';
     const UPDATED_AT = 'updated_at';
    
 
 
 
     public $timestamps = false;
}
