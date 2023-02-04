<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = [
        'visitor_ip_address','visitor_date','created_at','updated_at'
    ];
    protected $primaryKey = 'visitor_id';
    protected $table = 'visitor';
}
