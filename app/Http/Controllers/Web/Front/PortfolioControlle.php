<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Testimonial;
class PortfolioControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
        $portfolio=Portfolio::all()->where('status','publish');
        return view('web.front.portfolio.index',compact('category','portfolio'));
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        $testimonial_count=Testimonial::all()->count();
        $testimonial=Testimonial::all();
        return view('web.front.single-page.single-portfolio',compact('portfolio','testimonial_count','testimonial'));
    }
}
