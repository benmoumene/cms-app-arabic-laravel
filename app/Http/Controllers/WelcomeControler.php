<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use App\Category;
use App\UrgentNew;
use App\News;
use App\Advertisment;
class WelcomeControler extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $urgent_newss = UrgentNew::orderBy('created_at', 'desc')->take(10)->get();

    $main_newss=News::where('position', 'like', "%\"2\"%")->orderBy('created_at', 'desc')->take(4)->get()->toArray();

        $blog_newss= News::join('categories','categories.id','=','news.category_id')->select('news.*','categories.name as categories_name')->where('position', 'like', "%\"2\"%")->orderBy('created_at', 'desc')->take(4)->get()->toArray();
        $ad1=Advertisment::where('position','اعلى الموقع')->first();
        $ad2=Advertisment::where('position','يسار')->first();
        $ad3=Advertisment::where('position','اسفل القائمة')->first();
      
        return  view('welcome')->with([
            'categories'=>$categories,
            'urgent_newss'=>$urgent_newss,
            'main_newss'=>$main_newss,
            'blog_newss'=>$blog_newss,
            'ad1'=>$ad1,
            'ad2'=>$ad2,
            'ad3'=>$ad3
            ]);
    }
}