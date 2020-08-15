<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Tags;
use App\User;

class News extends Model
{
    use \Conner\Tagging\Taggable;

    protected $fillable = [
        'id','new_writer', 'category_id','updates_count','position','reference_address','news_address','source','link', 'image', 'video','new_body','created_at','updated_at'
    ];
    protected $table = 'news';


    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tags','new_tag', 'tag_id', 'new_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function setPositionAttribute($value)
    {
        $this->attributes['position'] = json_encode($value);
    }

    public function getPositionAttribute($value)
    {
        return $this->attributes['position'] = json_decode(json_encode($value),true);
    }

}
