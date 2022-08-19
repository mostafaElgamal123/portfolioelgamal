<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
class AboutDashControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=About::all();
        return view('web.dashborad.pages.about.index',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $about=About::all()->count();
        if($about<1):
            return view('web.dashborad.pages.about.create');
        else:
            $about=About::all();
            return view('web.dashborad.pages.about.index',compact('about'));
        endif;
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
            'title'            =>'required|min:3|max:150',
            'description_left' =>'required|min:3|max:1000',
            'description_right'=>'required|min:3|max:1000',
            'image_left'       =>'required',
            'image_right'      =>'required',
            'video'            =>'required'
        ]);
        $about=new About;
        if($about->count()<1):
            $about=About::create($request->all());
            if($request->file('image_left')){
                $file= $request->file('image_left');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('/Images/about'), $filename);
                $about->image_left= $filename;
                $about->save();
            }
            if($request->file('image_right')){
                $file= $request->file('image_right');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('/Images/about'), $filename);
                $about->image_right= $filename;
                $about->save();
            }
            $about=About::all();
           return view('web.dashborad.pages.about.index',compact('about'));
        else:
            $about=About::all();
            return view('web.dashborad.pages.about.index',compact('about'));
        endif;
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
    public function edit(About $about)
    {
        return view('web.dashborad.pages.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,About $about)
    {
        $request->validate([
            'title'            =>'required|min:3|max:150',
            'description_left' =>'required|min:3|max:1000',
            'description_right'=>'required|min:3|max:1000',
            'image_left'       =>'required',
            'image_right'      =>'required',
            'video'            =>'required'
        ]);
        if($request->has('image_left')&&$request->has('image_right')){
            $file1= $request->file('image_left');
            $filename1= date('YmdHi').$file1->getClientOriginalName();
            $file1-> move(public_path('/Images/about'), $filename1);
            $image_path1 = public_path('/Images/about').'/'.$about->image_left;
            if(file_exists($image_path1)):
               unlink($image_path1);
            endif;
            $file= $request->file('image_right');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/about'), $filename);
            $image_path = public_path('/Images/about').'/'.$about->image_right;
            if(file_exists($image_path)):
                unlink($image_path);
            endif;
            $about->update($request->all());
            $about->image_left= $filename1;
            $about->image_right= $filename;
            $about->save();
        }else{
            $about=About::update($request->all());
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $image_path = public_path('/Images/about').'/'.$about->image_left;
        if(file_exists($image_path)):
            unlink($image_path);
        endif;
        $image_path2 = public_path('/Images/about').'/'.$about->image_right;
        if(file_exists($image_path2)):
            unlink($image_path2);
        endif;
        $about->delete();
        return back()->with('success','date deleted successfully');
    }
}
