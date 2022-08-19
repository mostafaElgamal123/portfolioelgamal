@extends('web.dashborad.master')


@section('title','service')

@section('breadcrumb','service')

@section('content')


<a href="{{url('admin/services/create')}}" class="btn btn-primary">
    add service
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">status</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($service as $servic)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{url('/Images/service/'.$servic->image)}}" alt=""></td>
                <td class="align-middle">{{$servic->title}}</td>
                <td class="align-middle"><?php $content_1=substr($servic->description,0,50);
                    echo $content_1."...";
                  ?></td>
                <td class="align-middle">
                    @if($servic->status=='publish')
                      <span class="btn btn-success w-40 m-2">{{$servic->status}}</span>
                    @else
                      <span class="btn btn-warning w-40 m-2">{{$servic->status}}</span> 
                    @endif
                </td>
                <td class="align-middle"><a href="{{url('admin/services/'.$servic->id."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('admin/services/'.$servic->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
            <tr>
                <td colspan="8" class="align-middle">
                    {{ $service->links('web.dashborad.pagination.custom') }}
                </td>
            </tr>
    </tbody>
    </table>
</div>
@endsection