<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\News;
use App\User;
use App\Tags;
use App\Draft;
use DB;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::paginate(5);
        $categories=Category::all();

        return view('admin.news.index')->with(['news'=>$news,'categories'=>$categories]);
    }
   
    public function search(Request $request)
    {
        $categories=Category::all();
        $category_id=$request->$category_id;
    $news=News::with(['reference_address', 'category_id'])
    ->where('reference_address',$request->reference_address)
    ->whereHas('services', function ($query) use ($category_id) {
        $query->where('category_id',$category_id);
    })
    ->paginate(5);
    return view('admin.news.index')->with(['news'=>$news,'categories'=>$categories]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $categories=Category::all();
        return view('admin.news.create')->with(['categories'=>$categories,'users'=>$users]);

    }

   
 
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request->has('publish')){
        $this->validate($request, [
            'new_writer' => 'required',
            'new_body' => 'required',
            'category_id' => 'required',
            'reference_address' => 'required',
            'news_address' => 'required',
            'source' => 'required',
        ]);

        $news= new News();
        $news->new_writer = $request->new_writer;
        $news->id = $request->id;
        $news->source = $request->source;
        $news->category_id = $request->category_id;
        $news->link = $request->link;
        $news->reference_address = $request->reference_address;
        $news->news_address = $request->news_address;
        $news->position = $request->position;
        $news->new_body =$request->new_body;

        
        if ($request->hasFile('image')&&$request->file('image')->isValid()) {
            $files = $request->file('image');
               $destinationPath = public_path('/images/news');
            $image = date('image') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);
    
               $insert['image'] = $image;
               
                $news->image=$image;
            }
                    $news->save();


                    $news->tag(explode(',', $request->tags));

                    
                    $news->save();



        return back()->with('success','News created successfully.');
    }else if ($request->has('save')){
       

    $this->validate($request, [
        'new_writer' => 'required',
        'new_body' => 'required',
        'category_id' => 'required',
        'reference_address' => 'required',
        'news_address' => 'required',
        'source' => 'required',
    ]);
    $draft= new Draft();
    $draft->new_writer = $request->new_writer;
    $draft->id = $request->id;
    $draft->source = $request->source;
    $draft->category_id = $request->category_id;
    $draft->link = $request->link;
    $draft->reference_address = $request->reference_address;
    $draft->news_address = $request->news_address;
    $draft->position= json_encode($request->position);
    $draft->new_body =$request->new_body;

    
    if ($request->hasFile('image')&&$request->file('image')->isValid()) {
        $files = $request->file('image');
           $destinationPath = public_path('/images/draft/news');
        $image = date('image') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $image);

           $insert['image'] = $image;
           
            $draft->image=$image;
        }
                $draft->save();


                $draft->tag(explode(',', $request->tags));

                
                $draft->save();



    return back()->with('success','تم حفظ الخبر في المسودة بنجاح');

}


    }
    


    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {     
       
        $new =News::findOrFail($id);
        $tags=$new->tags;

        $users=User::all();
        $categories=Category::all();
        return view('admin.news.edit')->with(['categories'=>$categories,'users'=>$users,'new'=>$new,'tags'=>$tags]);
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $new=News::findOrFail($id);
        $new->updates_count=$new->updates_count+1;

    
        $image=$new->image;

          
        /* if($product->image ){
         }*/
         if ($request->hasFile('image')&&$request->file('image')->isValid()) {
             //code for remove old image
           \File::delete(public_path("images\news\\".$new->image)); 

           $files = $request->file('image');
              // Define upload path
              $destinationPath = public_path('/images/news/');// upload path
           // Upload Orginal Image           
              $image = date('image') . "." . $files->getClientOriginalExtension();
              $files->move($destinationPath, $image);
              $insert['image'] = $image;
          
       }
       if($request->has('tags')){
DB::table('tagging_tagged')->where(['taggable_type'=>'App\News','taggable_id'=>$new->id])->delete();
$new->tag(explode(',', $request->tags));
}
       $data=$request->all();
       $data['image']=$image;
       $new->update($data);
    

       session()->flash('success','new updated');
       return redirect (route('admin.news.index'));       
    
        }

        
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new=News::findOrFail($id);
        \File::delete(public_path("\images\news\\".$new->image)); 
        $new->delete();
        DB::table('tagging_tagged')->where(['taggable_type'=>'App\News','taggable_id'=>$new->id])->delete();

        session()->flash("success","new Deleted sucessfully");
        return response()->noContent();
    }

    
}
