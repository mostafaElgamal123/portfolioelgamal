<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Category;
use App\Models\Client;
use App\Models\Testimonial;
class PortfolioDashControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio=Portfolio::paginate(6);
        return view('web.dashborad.pages.portfolio.index',compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client=Client::all();
        $category=Category::all();
        return view('web.dashborad.pages.portfolio.create',compact('category','client'));
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
            'project_url' =>'required',
            'image'       =>'required',
            'category_id' =>'required',
            'client_id'   =>'required',
            'status'      =>'required'
        ]);
        $portfolio=portfolio::create($request->all());
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/portfolio'), $filename);
            $portfolio->image= $filename;
            $portfolio->save();
        }
        return back()->with('success','date added successfully');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        $client=Client::all();
        $category=Category::all();
        return view('web.dashborad.pages.portfolio.edit',compact('portfolio','category','client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Portfolio $portfolio)
    {
        $request->validate([
            'title'       =>'required|min:3|max:150',
            'description' =>'required|min:3|max:5000',
            'project_url' =>'required',
            'image'       =>'required',
            'category_id' =>'required',
            'client_id'   =>'required',
            'status'      =>'required'
        ]);
        if($request->has('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/Images/portfolio'), $filename);
            $image_path = public_path('/Images/portfolio').'/'.$portfolio->image;
            if(file_exists($image_path)):
               unlink($image_path);
            endif;
            $portfolio->update($request->all());
            $portfolio->image= $filename;
            $portfolio->save();
        }else{
            $portfolio=Portfolio::update($request->all());
        }
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $image_path = public_path('/Images/portfolio').'/'.$portfolio->image;
        if(file_exists($image_path)):
            unlink($image_path);
        endif;
        $portfolio->delete();
        return back()->with('success','date deleted successfully');
    }
}
