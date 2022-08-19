<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
class ServiceDashControlle extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service=Service::paginate(6);
        return view('web.dashborad.pages.services.index',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.pages.services.create');
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
            'image'      =>'required',
            'status'      =>'required'
        ]);
        $service=Service::create($request->all());
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/service'), $filename);
            $service->image= $filename;
            $service->save();
        }
        return back()->with('success','date added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('web.dashborad.pages.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Service $service)
    {
        $request->validate([
            'title'       =>'required|min:3|max:150',
            'description' =>'required|min:3|max:500',
            'image'      =>'required',
            'status'      =>'required'
        ]);
        if($request->has('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/service'), $filename);
            $image_path = public_path('/Images/service').'/'.$service->image;
            if(file_exists($image_path)):
               unlink($image_path);
            endif;
            $service->update($request->all());
            $service->image= $filename;
            $service->save();
        }else{
            $service=Service::update($request->all());
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service)
    {
        $image_path = public_path('/Images/service').'/'.$service->image;
        if(file_exists($image_path)):
            unlink($image_path);
        endif;
        $service->delete();
        return back()->with('success','date deleted successfully');
    }
}
