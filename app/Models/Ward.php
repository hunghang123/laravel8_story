<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'namexptt','type','maqh'
    ];
    protected $primaryKey = 'maxptt';
    protected $table = 'ward';
}
