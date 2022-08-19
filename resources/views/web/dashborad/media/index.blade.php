@extends('web.dashborad.master')


@section('title','media')

@section('breadcrumb','media')

@section('content')

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form  action="{{url('admin/medias')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mb-3">
                    <h1>social</h1>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">Twitter</label>
                        <input type="url" name="twitter" value="{{old('twitter')}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">Facebook</label>
                        <input type="url" name="facebook" value="{{old('facebook')}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">Instagram</label>
                        <input type="url" name="instagram" value="{{old('instagram')}}" value="{{old('twitter')}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">LinkedIn</label>
                        <input type="url" name="linkedin" value="{{old('linkedin')}}" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <h1>contact</h1>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">location</label>
                        <input type="text" name="location" value="{{old('location')}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">email</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">phone</label>
                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">open_hours</label>
                        <input type="text" name="open_hours" value="{{old('open_hours')}}" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">save</button>
        </form>
    </div>
</div>
@endsection