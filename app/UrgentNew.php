<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class UrgentNew extends Model
{
    protected $fillable = [
        'id','new_writer', 'category_id','reference_address','updates_count','created_at','updated_at'
    ];
    protected $table = 'urgent_news';
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
