<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Team;
use App\Models\Testimonial;
class AboutControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=About::all();
        $team=Team::all()->where('status', 'publish');
        $testimonial=Testimonial::all()->where('status', 'publish');
        return view('web.front.about-us.index',compact('about','team','testimonial'));
    }
}
