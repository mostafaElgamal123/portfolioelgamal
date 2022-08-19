@extends('web.dashborad.master')


@section('title','FAQ')

@section('breadcrumb','FAQ')

@section('content')


<a href="{{url('admin/faqs/create')}}" class="btn btn-primary">
    add faq
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">question</th>
            <th scope="col">answer</th>
            <th scope="col">status</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($faq as $fa)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle">{{$fa->question}}</td>
                <td class="align-middle">
                <?php $content_1=substr($fa->answer,0,50);
                    echo $content_1."...";
                  ?>
                </td>
                <td class="align-middle">
                    @if($fa->status=='publish')
                      <span class="btn btn-success w-40 m-2">{{$fa->status}}</span>
                    @else
                      <span class="btn btn-warning w-40 m-2">{{$fa->status}}</span> 
                    @endif
                </td>
                <td class="align-middle"><a href="{{url('admin/faqs/'.$fa->id."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('admin/faqs/'.$fa->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
            <tr>
                <td colspan="8" class="align-middle">
                    {{ $faq->links('web.dashborad.pagination.custom') }}
                </td>
            </tr>
    </tbody>
    </table>
</div>
@endsection