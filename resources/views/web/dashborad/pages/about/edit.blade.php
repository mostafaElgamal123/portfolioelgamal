@extends('web.dashborad.master')


@section('title','update')

@section('breadcrumb','update')

@section('content')

<a href="{{url('admin/abouts')}}" class="btn btn-info">
    view about
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('admin/abouts/'.$about->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{$about->title}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description left</label>
                <textarea name="description_left" class="form-control" cols="30" rows="10">{{$about->description_left}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">description right</label>
                <textarea name="description_right" class="form-control" cols="30" rows="10">{{$about->description_right}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">image left</label>
                <input type="file" name="image_left" value="{{$about->image_left}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">image right</label>
                <input type="file" name="image_right" value="{{$about->image_right}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">video url</label>
                <input type="url" name="video" value="{{$about->video}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection