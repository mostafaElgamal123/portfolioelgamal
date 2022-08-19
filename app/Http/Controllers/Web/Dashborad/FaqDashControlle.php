<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
class FaqDashControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq=Faq::paginate(6);
        return view('web.dashborad.pages.home.section-faq.index',compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.dashborad.pages.home.section-faq.create');
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
            'question'       =>'required|min:3|max:150',
            'answer'         =>'required|min:3|max:500',
            'status'         =>'required'
        ]);
        $faq=faq::create($request->all());
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
     *7
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(faq $faq)
    {
        return view('web.dashborad.pages.home.section-faq.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Faq $faq)
    {
        $request->validate([
            'question'       =>'required|min:3|max:150',
            'answer'         =>'required|min:3|max:500',
            'status'      =>'required'
        ]);
        $faq->update($request->all());
        return back()->with('success','date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return back()->with('success','date deleted successfully');
    }
}
