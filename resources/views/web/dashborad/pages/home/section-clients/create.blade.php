@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','create')

@section('content')

<a href="{{url('admin/clients')}}" class="btn btn-info">
    view clients
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('admin/clients')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{old('image')}}" class="form-control">
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