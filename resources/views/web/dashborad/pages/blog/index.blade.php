@extends('web.dashborad.master')


@section('title','blog')

@section('breadcrumb','blog')

@section('content')


<a href="{{url('admin/blogs/create')}}" class="btn btn-primary">
    add blog
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">user</th>
            <th scope="col">section</th>
            <th scope="col">category</th>
            <th scope="col">status</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blog as $blo)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{url('/Images/blog/'.$blo->image)}}" alt=""></td>
                <td class="align-middle">{{$blo->title}}</td>
                <td class="align-middle"><?php $content_1=substr($blo->description,0,60);
                    echo $content_1."...";
                  ?></td>
                <td class="align-middle"><span class="btn">{{$blo->Users->name}}</span></td>
                <td class="align-middle">
                    <div class="d-flex flex-row flex-wrap w-100">
                        @foreach($blo->sectionblogs as $key=>$value)
                        <span class="btn btn-primary w-40 m-2">{{$value->title}}</span>
                        @endforeach
                    </div>
                </td>
                <td class="align-middle"><span class="btn btn-secondary w-40 m-2">{{$blo->categories->name}}</span></td>
                <td class="align-middle">
                    @if($blo->status=='publish')
                      <span class="btn btn-success w-40 m-2">{{$blo->status}}</span>
                    @else
                      <span class="btn btn-warning w-40 m-2">{{$blo->status}}</span> 
                    @endif
                </td>
                <td class="align-middle"><a href="{{url('admin/blogs/'.$blo->id."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('admin/blogs/'.$blo->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
            <tr>
                <td colspan="8" class="align-middle">
                    {{ $blog->links('web.dashborad.pagination.custom') }}
                </td>
            </tr>
    </tbody>
    </table>
</div>
@endsection