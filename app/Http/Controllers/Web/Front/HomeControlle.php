<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\About;
use App\Models\Client;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Team;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Media;
class HomeControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media=Media::first();
        $category=Category::all();
        $portfolio=Portfolio::all()->where('status','publish');
        $about=About::all();
        $client=Client::all()->where('status','publish');
        $faq=Faq::where('status','publish')->limit(6)->get();
        $service=Service::where('status','publish')->limit(3)->get();
        $team=Team::where('status','publish')->limit(4)->get();
        $testimonial=Testimonial::all()->where('status','publish');
        $blog=Blog::where('status','publish')->orderby('created_at', 'DESC')->take(3)->get();
        return view('web.front.home.index',compact('media','category','portfolio','about','client','faq','service','team','testimonial','blog'));
    }
}
