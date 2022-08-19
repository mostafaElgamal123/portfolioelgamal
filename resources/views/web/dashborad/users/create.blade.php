@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','add user')

@section('content')

<a href="{{url('admin/users')}}" class="btn btn-info">
    view users
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('admin/users')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">email</label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">password</label>
                <input type="text" name="password" value="{{old('password')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{old('image')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">type</label>
                <select name="role" value="{{old('type')}}" class="form-select">
                    <option value="0">user</option>
                    <option value="1">admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
</div>

@endsection