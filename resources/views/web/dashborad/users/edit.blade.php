@extends('web.dashborad.master')


@section('title','update')

@section('breadcrumb','update')

@section('content')

<a href="{{url('admin/users')}}" class="btn btn-info">
    view users
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('admin/users/'.$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">password</label>
                <input type="text" name="password" value="{{$user->password}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" name="image" value="{{$user->image}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">type</label>
                <select name="role" value="{{$user->role}}" class="form-select">
                    <option value="0">user</option>
                    <option value="1">admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

@endsection