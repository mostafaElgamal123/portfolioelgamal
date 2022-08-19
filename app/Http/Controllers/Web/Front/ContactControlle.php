<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Contact;
class ContactControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media=Media::first();
        return view('web.front.contact.index',compact('media'));
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
            'name'        =>'required|min:3|max:150',
            'email'       =>'required|min:3|max:150',
            'subject'     =>'required|min:3|max:150',
            'message'     =>'required|min:3|max:500'
        ]);
        $Contact=Contact::create($request->all());
        return response()->json(['success'=>'Successfully']);
    }
   
}
