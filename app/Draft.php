<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tags;
use App\Category;

class Draft extends Model
{
    use \Conner\Tagging\Taggable;

    protected $fillable = [
        'id','new_writer','updates_count', 'category_id', 'position','reference_address','news_address','source','link', 'image', 'video','new_body','created_at','updated_at'
    ];
    protected $table = 'drafts';
    public function tags()
    {
        return $this->belongsToMany('App\Tags','draft_tag', 'tag_id', 'draft_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }


}
