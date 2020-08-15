<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{   

    protected $fillable=['id','title','desc','image','links','position'];

}
