<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = ['category_name','category_desc','category_status','created_at','update_at','category_parent','category_image'];
    protected $primaryKey = 'category_id';
    protected $table = 'category';
    public function danhmuc()
    {
        return $this->belongsTo('App\Models\Category','category_id','category_id');
     }
     
}
