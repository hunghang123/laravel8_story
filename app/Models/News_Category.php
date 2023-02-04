<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News_Category extends Model
{
    use HasFactory;
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = ['news_category_name','news_category_status'];
    protected $primaryKey = 'news_category_id';
    protected $table = 'news_category';
}
