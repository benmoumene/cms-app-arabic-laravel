<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UrgentNew;
use App\Category;
use App\News;
use App\User;
use App\Tags;
use App\Draft;


class UrgentNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=UrgentNew::paginate(5);
        $categories=Category::all();

        return view('admin.news.urgent.index')->with(['news'=>$news,'categories'=>$categories]);
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
        return view('admin.news.urgent.create')->with(['categories'=>$categories,'users'=>$users]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'new_writer' => 'required',
            'category_id' => 'required',
            'reference_address' => 'required',
        ]);
        

        UrgentNew::create($request->all());
        return back()->with('success','News created successfully.');


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
       
        $new =UrgentNew::findOrFail($id);

        $users=User::all();
        $categories=Category::all();
        return view('admin.news.urgent.create')->with(['categories'=>$categories,'users'=>$users,'new'=>$new]);
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

        $new =UrgentNew::findOrFail($id);
        $new->updates_count=$new->updates_count+1;

        $new->update($request->all());
        return redirect(route('admin.news_urgent.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new =UrgentNew::findOrFail($id);
        $new->delete();
        session()->flash("success","new Deleted sucessfully");
        return response()->noContent();
    }
}
