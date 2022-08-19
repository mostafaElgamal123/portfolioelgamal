@extends('web.dashborad.master')


@section('title','media')

@section('breadcrumb','media')

@section('content')

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form  action="{{url('admin/medias/'.$media->id)}}"  method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="mb-3">
                    <h1>social</h1>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">Twitter</label>
                        <input type="url" name="twitter" value="{{$media->twitter}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">Facebook</label>
                        <input type="url" name="facebook" value="{{$media->facebook}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">Instagram</label>
                        <input type="url" name="instagram" value="{{$media->instagram}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">LinkedIn</label>
                        <input type="url" name="linkedin" value="{{$media->linkedin}}" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <h1>contact</h1>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">location</label>
                        <input type="text" name="location" value="{{$media->location}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">email</label>
                        <input type="email" name="email" value="{{$media->email}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">phone</label>
                        <input type="text" name="phone" value="{{$media->phone}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">open_hours</label>
                        <input type="text" name="open_hours" value="{{$media->open_hours}}" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">save</button>
        </form>
    </div>
</div>
@endsection