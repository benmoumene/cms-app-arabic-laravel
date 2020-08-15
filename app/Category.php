<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;
use App\Draft;
use App\UrgentNew;


class Category extends Model
{
    protected $fillable=['id','name','desc'];

    public function news()
    {
        return $this->hasMany('App\News');
    }
    public function urgentNews()
    {
        return $this->hasMany('App\UrgentNew');
    }

    public function drafts()
    {
        return $this->hasMany('App\Draft');
    }
}
