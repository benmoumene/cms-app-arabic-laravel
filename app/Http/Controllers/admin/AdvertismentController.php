<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Advertisment;

class AdvertismentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads=Advertisment::paginate(5);
        return view('admin.advertisment.index')->with('ads',$ads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ad= new Advertisment();
        $ad->title = $request->title;
        $ad->desc = $request->desc;
        $ad->links = $request->links;
        $ad->position = $request->position;
        

       
        if ($request->hasFile('image')&&$request->file('image')->isValid()) {
            $files = $request->file('image');
               // Define upload path
               $destinationPath = public_path('/images/ads');// upload path
            // Upload Orginal Image           
            $image = date('image') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);
    
               $insert['image'] = $image;
            // Save In Database
               
                $ad->image=$image;
            }
                    $ad->save();

                    
                    session()->flash('success','advertisment created sucess');
                    session()->flash('error','advertisment created sucess');
                    return redirect (route('admin.advertisment.index'));
      
    
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad=Advertisment::findOrFail($id);
        \File::delete(public_path("images\ads\\".$ad->image)); 
        $ad->delete();
        session()->flash("success","Advertisment Deleted sucessfully");
        return response()->noContent();
    }
}
