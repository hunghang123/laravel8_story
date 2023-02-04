<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportFee extends Model
{
    use HasFactory;
    protected $fillable = [
       'matp','maqh','maxptt','shipping_fee','create_at','update_at'
    ];
    protected $primaryKey = 'feeship_id';
    protected $table = 'transport_feeship';

    public function city(){
        return $this->belongsTo('App\Models\City','matp');
    }
    public function district(){
        return $this->belongsTo('App\Models\District','maqh');
    }
    public function ward(){
        return $this->belongsTo('App\Models\Ward','maxptt');
    }
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';



    public $timestamps = false;
}
