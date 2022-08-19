@extends('web.dashborad.master')


@section('title','about')

@section('breadcrumb','about')

@section('content')



<?php if($about->count() <= 0): ?>
<a href="{{url('admin/abouts/create')}}" class="btn btn-primary">
    add about
</a>
<?php
endif;
?>
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image left</th>
            <th scope="col">image right</th>
            <th scope="col">title</th>
            <th scope="col">description left</th>
            <th scope="col">description right</th>
            <th scope="col">video</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($about as $abou)
            <tr>
                <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{url('/Images/about/'.$abou->image_left)}}" alt=""></td>
                <td class="align-middle"><img style="width:60px;height:60px;border-radius:50%;" src="{{url('/Images/about/'.$abou->image_right)}}" alt=""></td>
                <td class="align-middle">{{$abou->title}}</td>
                <td class="align-middle">
                <?php $content_1=substr($abou->description_left,0,50);
                    echo $content_1."...";
                  ?>
                </td>
                <td class="align-middle"><?php $content_1=substr($abou->description_right,0,50);
                    echo $content_1."...";
                  ?></td>
                <td class="align-middle">{{$abou->video}}</td>
                <td class="align-middle"><a href="{{url('admin/abouts/'.$abou->id."/edit")}}" class="btn btn-info"><i class="fas fa-edit"></i> edit</a></td>
                <td class="align-middle">
                    <form action="{{url('admin/abouts/'.$abou->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection