@extends('web.dashborad.master')


@section('title','update')

@section('breadcrumb','update')

@section('content')

<a href="{{url('admin/blogs')}}" class="btn btn-info">
    view blogs
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('admin/blogs/'.$blog->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{$blog->title}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" class="form-control" cols="30" rows="10">{{$blog->description}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{$blog->image}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">category</label>
                <select name="category_id" value="{{old('category_id')}}" class="form-select">
                @foreach($category as $cate)
                    <option value="{{$cate->id}}" @if($cate->id==$blog->category_id) selected @endif>{{$cate->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">status</label>
                <select name="status" value="{{$blog->status}}" class="form-select">
                    <option selected>publish</option>
                    <option value="draft">draft</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection