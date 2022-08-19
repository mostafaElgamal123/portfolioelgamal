@extends('web.front.master')


@section('title','portfolio')


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
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Portfolio</h2>
        <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et autem uia reprehenderit sunt deleniti</p>
      </div>

      <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

        <div>
          <ul class="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            @foreach($category as $cate)
            <li data-filter=".f-{{$cate->id}}">{{$cate->name}}</li>
            @endforeach
          </ul><!-- End Portfolio Filters -->
        </div>

        <div class="row gy-4 portfolio-container">
          @foreach($portfolio as $portfo)
          <div class="col-xl-4 col-md-6 portfolio-item f-{{$portfo->category_id}}">
            <div class="portfolio-wrap">
              <a href="{{$portfo->project_url}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{'images/portfolio/'.$portfo->image}}" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="{{url('portfolios/'.$portfo->id)}}" title="More Details">{{$portfo->title}}</a></h4>
                <?php $content_1=substr($portfo->description,0,40);
                    echo $content_1."...";
                  ?>
              </div>
            </div>
          </div><!-- End Portfolio Item -->
          @endforeach
        </div><!-- End Portfolio Container -->

      </div>

    </div>
  </section><!-- End Portfolio Section -->
@endsection
