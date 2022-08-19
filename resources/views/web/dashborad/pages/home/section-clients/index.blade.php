@extends('web.dashborad.master')


@section('title','clients')

@section('breadcrumb','clients')

@section('content')


<a href="{{url('admin/clients/create')}}" class="btn btn-primary">
    add client
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">name</th>
            <th scope="col">status</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($client as $clien)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{url('/Images/client/'.$clien->image)}}" alt=""></td>
                <td class="align-middle">{{$clien->name}}</td>
                <td class="align-middle">
                    @if($clien->status=='publish')
                      <span class="btn btn-success w-40 m-2">{{$clien->status}}</span>
                    @else
                      <span class="btn btn-warning w-40 m-2">{{$clien->status}}</span> 
                    @endif
                </td>
                <td class="align-middle"><a href="{{url('admin/clients/'.$clien->id."/edit")}}" class="btn btn-info"><i class="fa fa-trash" aria-hidden="true"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('admin/clients/'.$clien->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
            <tr>
                <td colspan="8" class="align-middle">
                    {{ $client->links('web.dashborad.pagination.custom') }}
                </td>
            </tr>
    </tbody>
    </table>
</div>
@endsection