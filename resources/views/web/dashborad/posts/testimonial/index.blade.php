@extends('web.dashborad.master')


@section('title','testimonial')

@section('breadcrumb','testimonial')

@section('content')


<a href="{{url('admin/testimonials/create')}}" class="btn btn-primary">
    add testimonial
</a>

<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered ">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">location</th>
            <th scope="col">status</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($testimonial as $testimonia)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{url('/Images/testimonial/'.$testimonia->image)}}" alt=""></td>
                <td class="align-middle">{{$testimonia->title}}</td>
                <td class="align-middle">
                <?php $content_1=substr($testimonia->description,0,50);
                    echo $content_1."...";
                  ?>
                </td>
                <td class="align-middle">{{$testimonia->location}}</td>
                <td class="align-middle">
                    @if($testimonia->status=='publish')
                      <span class="btn btn-success w-40 m-2">{{$testimonia->status}}</span>
                    @else
                      <span class="btn btn-warning w-40 m-2">{{$testimonia->status}}</span> 
                    @endif
                </td>
                <td class="align-middle"><a href="{{url('admin/testimonials/'.$testimonia->id."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('admin/testimonials/'.$testimonia->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
            <tr>
                <td colspan="8" class="align-middle">
                    {{ $testimonial->links('web.dashborad.pagination.custom') }}
                </td>
            </tr>
    </tbody>
    </table>
</div>
@endsection