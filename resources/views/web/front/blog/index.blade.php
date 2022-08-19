@extends('web.front.master')


@section('title','blog')

@section('breadcrumbs')
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>@yield('title')</h2>
            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{route('index')}}">Home</a></li>
          <li>@yield('title')</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->
@endsection

@section('content')
<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4 posts-list">
      @foreach($blog as $blo)
      <div class="col-xl-4 col-md-6">
        <article>

          <div class="post-img">
            <img src="{{url('Images/blog/'.$blo->image)}}" alt="" class="img-fluid">
          </div>

          <p class="post-category">{{$blo->categories->name}}</p>

          <h2 class="title">
            <a href="{{url('blogs/'.$blo->id)}}">{{$blo->title}}</a>
          </h2>

          <div class="d-flex align-items-center">
            <img src="<?php if($blo->users->image!='team-3.jpg'): ?>{{url('/Images/user/'.$blo->users->image)}} <?php else: ?>{{url('/assets/img/team/'.$blo->users->image)}} <?php endif; ?>" alt="" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
              <p class="post-author-list">{{$blo->users->name}}</p>
              <p class="post-date">
                <time datetime="2022-01-01">{{$blo->created_at}}</time>
              </p>
            </div>
          </div>

        </article>
      </div><!-- End post list item -->
      @endforeach
    </div><!-- End blog posts list -->
    <div class="blog-pagination">
    {{ $blog->links('web.front.pagination.custom') }}
    </div><!-- End blog pagination -->

  </div>
</section><!-- End Blog Section -->
@endsection
