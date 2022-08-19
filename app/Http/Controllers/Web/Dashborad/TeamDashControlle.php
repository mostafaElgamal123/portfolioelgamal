<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
class TeamDashControlle extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team=Team::paginate(6);
        return view('web.dashborad.posts.team.index',compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.posts.team.create');
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
            'title'       =>'required|min:3|max:150',
            'description' =>'required|min:3|max:500',
            'image'       =>'required',
            'twitter'     =>'required',
            'facebook'    =>'required',
            'instagram'   =>'required',
            'linkedin'    =>'required',
            'status'      =>'required'
        ]);
        $team=Team::create($request->all());
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/team'), $filename);
            $team->image= $filename;
            $team->save();
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
    public function edit(Team $team)
    {
        return view('web.dashborad.posts.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Team $team)
    {
        $request->validate([
            'title'       =>'required|min:3|max:150',
            'description' =>'required|min:3|max:500',
            'image'       =>'required',
            'twitter'     =>'required',
            'facebook'    =>'required',
            'instagram'   =>'required',
            'linkedin'    =>'required',
            'status'      =>'required'
        ]);
        if($request->has('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/team'), $filename);
            $image_path = public_path('/Images/team').'/'.$team->image;
            if(file_exists($image_path)):
               unlink($image_path);
            endif;
            $team->update($request->all());
            $team->image= $filename;
            $team->save();
        }else{
            $team=Team::update($request->all());
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $image_path = public_path('/Images/team').'/'.$team->image;
        if(file_exists($image_path)):
            unlink($image_path);
        endif;
        $team->delete();
        return back()->with('success','date deleted successfully');
    }
}
