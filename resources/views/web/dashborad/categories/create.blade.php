@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','add category')

@section('content')

<a href="{{url('admin/categories')}}" class="btn btn-info">
    view categories
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('admin/categories')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
</div>

@endsection