@extends('web.dashborad.master')

@section('title','users')

@section('breadcrumb','users')

@section('content')


<a href="{{url('admin/users/create')}}" class="btn btn-primary">
    add users
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">status</th>
            <th scope="col">type</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $use)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="<?php if($use->image!='team-3.jpg'): ?>{{url('/Images/user/'.$use->image)}} <?php else: ?>{{url('/assets/img/team/'.$use->image)}} <?php endif; ?>" alt=""></td>
                <td class="align-middle">{{$use->name}}</td>
                <td class="align-middle">
                    {{$use->email}}
                </td>
                <td class="align-middle">
                    @if(Cache::has('user-is-online-' . $use->id))
                      <span class="btn btn-success w-40 m-2">Online</span>
                    @else
                      <span class="btn btn-warning w-40 m-2">Offline</span>
                    @endif
                </td>
                <td class="align-middle">
                    @if($use->role==1)
                     <span class="badge badge-success w-40 m-2">Admin</span>
                    @else
                     <span class="badge badge-warning w-40 m-2">User</span>
                    @endif
                </td>
                <td class="align-middle"><a href="{{url('admin/users/'.$use->id."/edit")}}" class="btn btn-info"> <i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('admin/users/'.$use->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
            <tr>
                <td colspan="8" class="align-middle">
                    {{ $user->links('web.dashborad.pagination.custom') }}
                </td>
            </tr>
    </tbody>
    </table>
</div>
@endsection

