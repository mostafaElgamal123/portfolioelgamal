<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
class TestimonialDashControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial=Testimonial::paginate(6);
        return view('web.dashborad.posts.testimonial.index',compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.posts.testimonial.create');
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
            'location'       =>'required|min:3|max:150',
            'image'       =>'required',
            'status'      =>'required'
        ]);
        $testimonial=Testimonial::create($request->all());
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/testimonial'), $filename);
            $testimonial->image= $filename;
            $testimonial->save();
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
    public function edit(Testimonial $testimonial)
    {
        return view('web.dashborad.posts.testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Testimonial $testimonial)
    {
        $request->validate([
            'title'       =>'required|min:3|max:150',
            'description' =>'required|min:3|max:500',
            'location'       =>'required|min:3|max:150',
            'image'       =>'required',
            'status'      =>'required'
        ]);
        if($request->has('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/testimonial'), $filename);
            $image_path = public_path('/Images/testimonial').'/'.$testimonial->image;
            if(file_exists($image_path)):
               unlink($image_path);
            endif;
            $testimonial->update($request->all());
            $testimonial->image= $filename;
            $testimonial->save();
        }else{
            $testimonial=Testimonial::update($request->all());
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $image_path = public_path('/Images/testimonial').'/'.$testimonial->image;
        if(file_exists($image_path)):
            unlink($image_path);
        endif;
        $testimonial->delete();
        return back()->with('success','date deleted successfully');
    }
}
