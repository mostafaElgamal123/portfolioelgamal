@extends('web.dashborad.master')


@section('title','team')

@section('breadcrumb','team')

@section('content')


<a href="{{url('admin/teams/create')}}" class="btn btn-primary">
    add team
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">twitter</th>
            <th scope="col">facebook</th>
            <th scope="col">Instagram</th>
            <th scope="col">LinkedIn</th>
            <th scope="col">status</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($team as $tea)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{url('/Images/team/'.$tea->image)}}" alt=""></td>
                <td class="align-middle">{{$tea->title}}</td>
                <td class="align-middle">{{$tea->description}}</td>
                <td class="align-middle">{{$tea->twitter}}</td>
                <td class="align-middle">{{$tea->facebook}}</td>
                <td class="align-middle">{{$tea->instagram}}</td>
                <td class="align-middle">{{$tea->linkedin}}</td>
                <td class="align-middle">
                    @if($tea->status=='publish')
                      <span class="btn btn-success w-40 m-2">{{$tea->status}}</span>
                    @else
                      <span class="btn btn-warning w-40 m-2">{{$tea->status}}</span> 
                    @endif
                </td>
                <td class="align-middle"><a href="{{url('admin/teams/'.$tea->id."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('admin/teams/'.$tea->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
            <tr>
                <td colspan="8" class="align-middle">
                    {{ $team->links('web.dashborad.pagination.custom') }}
                </td>
            </tr>
    </tbody>
    </table>
</div>
@endsection