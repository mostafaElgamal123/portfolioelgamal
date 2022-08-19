@extends('web.dashborad.master')


@section('title','contact')

@section('breadcrumb','contact message')

@section('content')
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">subject</th>
            <th scope="col">message</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contact as $contac)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle">{{$contac->name}}</td>
                <td class="align-middle">{{$contac->email}}</td>
                <td class="align-middle">{{$contac->subject}}</td>
                <td class="align-middle">{{$contac->message}}</td>
                <td class="align-middle">
                    <form action="{{url('admin/contacts/'.$contac->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
            <tr>
                <td colspan="8" class="align-middle">
                    {{ $contact->links('web.dashborad.pagination.custom') }}
                </td>
            </tr>
    </tbody>
    </table>
</div>
@endsection