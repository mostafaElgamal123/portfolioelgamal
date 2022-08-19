@extends('web.dashborad.master')


@section('title','section to blog')

@section('breadcrumb','section to blog')

@section('content')


<a href="{{url('admin/sectionblogs/create')}}" class="btn btn-primary">
    add Section To Blog
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">blogs</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sectionblog as $sectionblo)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle">{{$sectionblo->title}}</td>
                <td class="align-middle">
                <?php $content_1=substr($sectionblo->description,0,50);
                    echo $content_1."...";
                  ?>
                </td>
                <td class="align-middle">
                      <span class="btn btn-success w-40 m-2">{{$sectionblo->blogs->title}}</span>
                </td>
                <td class="align-middle"><a href="{{url('/admin/sectionblogs/'.$sectionblo->id."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('/admin/sectionblogs/'.$sectionblo->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
            <tr>
                <td colspan="8" class="align-middle">
                    {{ $sectionblog->links('web.dashborad.pagination.custom') }}
                </td>
            </tr>
    </tbody>
    </table>
</div>
@endsection