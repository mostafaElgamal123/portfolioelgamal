<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserDashControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::paginate(6);
        return view('web.dashborad.users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        =>'required|min:3|max:150',
            'email'       =>'required|min:3|max:150',
            'password'    =>'required',
            'role'        =>'required',
        ]);
        $user=User::create($request->all());
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/user'), $filename);
            $user->image= $filename;
            $user->role= $request->role;
            $user->password=Hash::make($request->password);
            $user->save();
        }
        return back()->with('success','date added successfully');
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
    public function edit(User $user)
    {
        return view('web.dashborad.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $request->validate([
            'name'        =>'required|min:3|max:150',
            'email'       =>'required|min:3|max:150',
            'password'    =>'required',
            'role'        =>'required',
            'image'        =>'required',
        ]);
        if($request->has('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/user'), $filename);
            $image_path = public_path('/Images/user').'/'.$user->image;
            if(file_exists($image_path)):
               unlink($image_path);
            endif;
            $user->update($request->all());
            $user->image= $filename;
            $user->role= $request->role;
            $user->password=Hash::make($request->password);
            $user->save();
        }else{
            $user=User::update($request->all());
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $image_path = public_path('/Images/user').'/'.$user->image;
            if(file_exists($image_path)):
               unlink($image_path);
            endif;
        $user->delete();
        return back()->with('success','date deleted successfully');
    }
}
