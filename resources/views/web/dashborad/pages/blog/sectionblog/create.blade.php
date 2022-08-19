@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','create')

@section('content')

<a href="{{url('admin/sectionblogs')}}" class="btn btn-info">
    view Section To Blogs
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('admin/sectionblogs')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" value="{{old('description')}}"  class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">blogs</label>
                <select name="blog_id" value="{{old('blog_id')}}" class="form-select">
                    @foreach($blog as $blo)
                     <option value="{{$blo->id}}">{{$blo->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
</div>

@endsection