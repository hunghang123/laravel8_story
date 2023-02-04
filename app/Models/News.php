<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'news_name','news_desc','news_active','product_content','news_image','news_category_id','news_date','news_capture','news_view'
    ];
    protected $primaryKey = 'news_id';
    protected $table = 'news';
    public function danhmuctintuc()
    {
        return $this->belongsTo('App\Models\News_Category','news_category_id','news_category_id');
     }
}
