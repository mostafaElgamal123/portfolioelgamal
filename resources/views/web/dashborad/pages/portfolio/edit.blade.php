@extends('web.dashborad.master')


@section('title','update')

@section('breadcrumb','update')

@section('content')

<a href="{{url('admin/portfolios')}}" class="btn btn-info">
    view portfolios
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('admin/portfolios/'.$portfolio->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">title</label>
                <input type="text" name="title" value="{{$portfolio->title}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea name="description" class="form-control" cols="30" rows="10">{{$portfolio->description}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">project url</label>
                <input type="url" name="project_url" value="{{$portfolio->project_url}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{$portfolio->image}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">category</label>
                <select name="category_id" value="{{old('category_id')}}" class="form-select">
                    @foreach($category as $cate)
                       <option value="{{$cate->id}}" @if($cate->id==$portfolio->category_id) selected @endif>{{$cate->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">client</label>
                <select name="client_id" value="{{old('client_id')}}" class="form-select">
                    @foreach($client as $clien)
                       <option value="{{$clien->id}}" @if($clien->id==$portfolio->client_id) selected @endif>{{$clien->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">status</label>
                <select name="status" value="{{$portfolio->status}}" class="form-select">
                    <option selected>publish</option>
                    <option value="draft">draft</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection