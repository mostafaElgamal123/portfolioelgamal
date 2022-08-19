@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','create')

@section('content')

<a href="{{url('admin/teams')}}" class="btn btn-info">
    view team
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('admin/teams')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" class="form-control" cols="30" rows="10">{{old('description')}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{old('image')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Twitter</label>
                <input type="url" name="twitter" value="{{old('twitter')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Facebook</label>
                <input type="url" name="facebook" value="{{old('facebook')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Instagram</label>
                <input type="url" name="instagram" value="{{old('instagram')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">LinkedIn</label>
                <input type="url" name="linkedin" value="{{old('linkedin')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">status</label>
                <select name="status" value="{{old('status')}}" class="form-select">
                    <option selected>publish</option>
                    <option value="draft">draft</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
</div>

@endsection