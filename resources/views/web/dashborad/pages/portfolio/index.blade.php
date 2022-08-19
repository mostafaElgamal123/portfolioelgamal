@extends('web.dashborad.master')


@section('title','portfolio')

@section('breadcrumb','portfolio')

@section('content')


<a href="{{url('admin/portfolios/create')}}" class="btn btn-primary">
    add portfolio
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table border">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">project url</th>
            <th scope="col">client</th>
            <th scope="col">category</th>
            <th scope="col">status</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($portfolio as $portfo)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{url('/Images/portfolio/'.$portfo->image)}}" alt=""></td>
                <td class="align-middle">{{$portfo->title}}</td>
                <td class="align-middle"><?php $content_1=substr($portfo->description,0,50);
                    echo $content_1."...";
                  ?></td>
                <td class="align-middle"><a href="{{$portfo->project_url}}">{{$portfo->project_url}}</a></td>
                <td class="align-middle">{{$portfo->clients->name}}</td>
                <td class="align-middle"><span class="btn btn-secondary w-40 m-2">{{$portfo->categories->name}}</span></td>
                <td class="align-middle">
                    @if($portfo->status=='publish')
                      <span class="btn btn-success w-40 m-2">{{$portfo->status}}</span>
                    @else
                      <span class="btn btn-warning w-40 m-2">{{$portfo->status}}</span> 
                    @endif
                </td>
                <td class="align-middle"><a href="{{url('admin/portfolios/'.$portfo->id."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('admin/portfolios/'.$portfo->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
            <tr>
                <td colspan="8" class="align-middle">
                    {{ $portfolio->links('web.dashborad.pagination.custom') }}
                </td>
            </tr>
    </tbody>
    </table>
</div>
@endsection