@extends('web.front.master')


@section('title','services Details')

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
  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-between gy-4 mt-4">
        <div class="col-lg-8">
          <div class="portfolio-description">
            <img src="{{url('Images/service/'.$service->image)}}" alt="">
            <h2 class="mt-4">{{$service->title}}</h2>
            <?php $content_1=explode("\n",$service->description);
                  $content_2=implode($content_1,'<p>');
                  echo $content_2;
             ?>
          </div>
        </div>


      </div>

    </div>
  </section><!-- End Portfolio Details Section -->
@endsection
