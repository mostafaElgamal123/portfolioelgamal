<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
class BlogDashControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog=Blog::paginate(6);
        return view('web.dashborad.pages.blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('web.dashborad.pages.blog.create',compact('category'));
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
            'description' =>'required|min:3|max:5000',
            'image'       =>'required',
            'category_id' =>'required',
            'status'      =>'required',
        ]);
        
        $blog= new Blog;
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->image=$request->image;
        $blog->category_id=$request->category_id;
        $blog->status=$request->status;
        $blog->user_id = Auth::user()->id;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/blog'), $filename);
            $blog->image= $filename;
            $blog->save();
        }      
        return back()->with('success','date added successfully');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $category=Category::all();
        return view('web.dashborad.pages.blog.edit',compact('blog','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Blog $blog)
    {
        $request->validate([
            'title'       =>'required|min:3|max:150',
            'description' =>'required|min:3|max:5000',
            'image'       =>'required',
            'category_id' =>'required',
            'status'      =>'required'
        ]);
        if($request->has('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/blog'), $filename);
            $image_path = public_path('/Images/blog').'/'.$blog->image;
            if(file_exists($image_path)):
               unlink($image_path);
            endif;
            $blog->update($request->all());
            $blog->image= $filename;
            $blog->save();
        }else{
            $blog=Blog::update($request->all());
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $image_path = public_path('/Images/blog').'/'.$blog->image;
        if(file_exists($image_path)):
            unlink($image_path);
        endif;
        $blog->delete();
        return back()->with('success','date deleted successfully');
    }
}
