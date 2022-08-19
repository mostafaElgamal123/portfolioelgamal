@extends('web.dashborad.master')


@section('title','create')

@section('breadcrumb','create')

@section('content')

<a href="{{url('admin/faqs')}}" class="btn btn-info">
    view faqs
</a>

<div class="row pt-4 pb-4">
    @include('web.dashborad.layout.message')
    <div class="col-xl-8 col-12">
        <form action="{{url('admin/faqs')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">question</label>
                <input type="text" name="question" value="{{old('question')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">answer</label>
                <input type="text" name="answer" value="{{old('answer')}}" class="form-control">
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