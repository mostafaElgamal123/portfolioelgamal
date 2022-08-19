@extends('web.dashborad.master')
@section('title','welcome')
@section('breadcrumb','welcome')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="p-4 text-center bg-blue">welcome {{Auth::user()->name}}</h1>
        </div>
    </div>
</div>


@endsection