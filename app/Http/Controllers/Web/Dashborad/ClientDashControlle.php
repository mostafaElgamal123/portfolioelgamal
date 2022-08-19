<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
class ClientDashControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client=Client::paginate(6);
        return view('web.dashborad.pages.home.section-clients.index',compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.pages.home.section-clients.create');
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
            'image'       =>'required',
            'status'      =>'required'
        ]);
        $client=Client::create($request->all());
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/client'), $filename);
            $client->image= $filename;
            $client->save();
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
    public function edit(Client $client)
    {
        return view('web.dashborad.pages.home.section-clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Client $client)
    {
        $request->validate([
            'name'        =>'required|min:3|max:150',
            'image'       =>'required',
            'status'      =>'required'
        ]);
        if($request->has('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/client'), $filename);
            $image_path = public_path('/Images/client').'/'.$client->image;
            if(file_exists($image_path)):
               unlink($image_path);
            endif;
            $client->update($request->all());
            $client->image= $filename;
            $client->save();
        }else{
            $client=Client::update($request->all());
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $image_path = public_path('/Images/client').'/'.$client->image;
        if(file_exists($image_path)):
            unlink($image_path);
        endif;
        $client->delete();
        return back()->with('success','date deleted successfully');
    }
}
