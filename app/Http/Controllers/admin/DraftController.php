<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Tags;
use App\Draft;
use DB;

class DraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drafts=Draft::paginate(5);
        $categories=Category::all();

        return view('admin.draft.index')->with(['drafts'=>$drafts,'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $draft =Draft::findOrFail($id);
            $users=User::all();
            $categories=Category::all();
            $tags=$draft->tags;
            return view('admin.draft.edit')->with(['categories'=>$categories,'users'=>$users,'draft'=>$draft,'tags'=>$tags]);
    
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
            $draft=Draft::findOrFail($id);
            $draft->updates_count=$draft->updates_count+1;

            $image=$draft->image;
    
              
            /* if($product->image ){
             }*/
             if ($request->hasFile('image')&&$request->file('image')->isValid()) {
                 //code for remove old image
               \File::delete(public_path("images\draft\\".$draft->image)); 
    
               $files = $request->file('image');
                  // Define upload path
                  $destinationPath = public_path('/images/draft/');// upload path
               // Upload Orginal Image           
                  $image = date('image') . "." . $files->getClientOriginalExtension();
                  $files->move($destinationPath, $image);
                  $insert['image'] = $image;
              
           }
           if($request->has('tags')){
            DB::table('tagging_tagged')->where(['taggable_type'=>'App\Draft','taggable_id'=>$draft->id])->delete();
            $draft->tag(explode(',', $request->tags));
            }
            
           
           $data=$request->all();
           $data['image']=$image;
           $draft->update($data);
        
    
           session()->flash('success','draft updated');
           return redirect (route('admin.draft.index'));       
    
        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $draft=Draft::findOrFail($id);
        \File::delete(public_path("\images\draft\\".$draft->image)); 
        DB::table('tagging_tagged')->where(['taggable_type'=>'App\Draft','taggable_id'=>$draft->id])->delete();
        $draft->delete();
        session()->flash("success","draft Deleted sucessfully");
    return response()->noContent();
}
}