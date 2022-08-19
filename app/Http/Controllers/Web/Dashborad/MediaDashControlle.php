<?php

namespace App\Http\Controllers\Web\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
class MediaDashControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media=Media::all();
        if($media->count()<=0){
            return view('web.dashborad.media.index',compact('media'));
        }else{
            $media=Media::first();
            return view('web.dashborad.media.update',compact('media'));
        }
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
            'location'    =>'required|min:3|max:150',
            'email'       =>'required|min:3|max:150',
            'phone'       =>'required',
            'open_hours'  =>'required',
            'twitter'     =>'required',
            'facebook'    =>'required',
            'instagram'   =>'required',
            'linkedin'    =>'required'
        ]);
        $media=Media::create($request->all());
        return view('web.dashborad.media.update',compact('media'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Media $media)
    {
        $request->validate([
            'location'    =>'required|min:3|max:150',
            'email'       =>'required|min:3|max:150',
            'phone'       =>'required',
            'open_hours'  =>'required',
            'twitter'     =>'required',
            'facebook'    =>'required',
            'instagram'   =>'required',
            'linkedin'    =>'required'
        ]);
        $media->update($request->all());
        return view('web.dashborad.media.update',compact('media'));
    }

}
