<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
class BlogControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog=Blog::where('status','publish')->paginate(6);
        return view('web.front.blog.index',compact('blog'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $blog_all=Blog::where('status','publish')->orderby('created_at', 'DESC')->take(5)->get();
        $category=Category::all();
        return view('web.front.single-page.single-blog',compact('blog','blog_all','category'));
    }
}
