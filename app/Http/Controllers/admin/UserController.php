<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('type','<>','admin')->paginate(5);
return view('admin.users.all_user')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user= new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =bcrypt($request->password);
        
       //$post->tags()->attach($request->tags);

       
        if ($request->hasFile('picture')&&$request->file('picture')->isValid()) {
            $files = $request->file('picture');
               // Define upload path
               $destinationPath = public_path('/images/users');// upload path
            // Upload Orginal Image           
            $image = date('image') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);
    
               $insert['picture'] = $image;
            // Save In Database
               
                $user->picture=$image;
            }
                    $user->save();

                    
                    session()->flash('success','User created sucess');
                    session()->flash('error','User created sucess');
                    return redirect (route('admin.allUser'));
      
    
        
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
        $user=User::findOrFail($id);
        \File::delete(public_path("images\users\\".$user->picture)); 
        $user->delete();
        session()->flash("success","user Deleted sucessfully");
        return response()->noContent();


        
    }
}
