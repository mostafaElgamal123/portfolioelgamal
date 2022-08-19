@extends('web.dashborad.master')


@section('title','update')

@section('breadcrumb','update')

@section('content')

<a href="{{url('admin/teams')}}" class="btn btn-info">
    view team
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('admin/teams/'.$team->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{$team->title}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" class="form-control" cols="30" rows="10">{{$team->description}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{$team->image}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Twitter</label>
                <input type="url" name="twitter" value="{{$team->twitter}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Facebook</label>
                <input type="url" name="facebook" value="{{$team->facebook}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Instagram</label>
                <input type="url" name="instagram" value="{{$team->instagram}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">LinkedIn</label>
                <input type="url" name="linkedin" value="{{$team->linkedin}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">status</label>
                <select name="status" value="{{$team->status}}" class="form-select">
                    <option selected>publish</option>
                    <option value="draft">draft</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection