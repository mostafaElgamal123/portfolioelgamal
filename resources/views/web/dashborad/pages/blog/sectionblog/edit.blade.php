@extends('web.dashborad.master')


@section('title','update')

@section('breadcrumb','update')

@section('content')

<a href="{{url('admin/sectionblogs')}}" class="btn btn-info">
    view Section To Blogs
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('admin/sectionblogs/'.$sectionblog->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{$sectionblog->title}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" class="form-control" cols="30" rows="10">{{$sectionblog->description}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">blogs</label>
                <select name="blog_id" value="{{old('blog_id')}}" class="form-select">
                    @foreach($blog as $blo)
                     <option value="{{$blo->id}}" @if($sectionblog->blog_id==$blo->id) selected @endif>{{$blo->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection