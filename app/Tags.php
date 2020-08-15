<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;
use App\Draft;


class Tags extends Model
{
    protected $fillable=['id','name'];
    public function news()
    {
        return $this->belongsToMany('App\News');
    }
    public function draft()
    {
        return $this->belongsToMany('App\Draft');
    }
}
