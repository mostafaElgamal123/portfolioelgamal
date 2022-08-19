@extends('web.front.master')


@section('title','Portfolio Details')

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

      <div class="position-relative h-100">
        <div class="slides-1 portfolio-details-slider swiper">
          <div class="swiper-wrapper align-items-center">

            <div class="swiper-slide">
              <img src="{{url('Images/portfolio/'.$portfolio->image)}}" alt="">
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

      </div>

      <div class="row justify-content-between gy-4 mt-4">

        <div class="col-lg-8">
          <div class="portfolio-description">
            <h2>{{$portfolio->title}}</h2>
            <?php $content_1=explode("\n",$portfolio->description);
                  $content_2=implode($content_1,'<p>');
                  echo $content_2;
            ?>
            <?php $index=rand(0,$testimonial_count-1); if($testimonial_count >=1):
            ?>
            <div class="testimonial-item">
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                   <?php
                   if(isset($testimonial[$index]->description)){
                    echo $testimonial[$index]->description;
                   }
                   ?>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
              <div>
                  <?php
                  if(isset($testimonial[$index]->image)){
                    ?>
                    <img src="{{url('Images/testimonial/'.$testimonial[$index]->image)}}" class="testimonial-img" alt="">
                    <?php
                   }
                  ?>
                <h3>
                  <?php
                  if(isset($testimonial[$index]->title)){
                    echo $testimonial[$index]->title;
                   }
                  ?>
                </h3>
                <h4><?php
                  if(isset($testimonial[$index]->location)){
                    echo $testimonial[$index]->location;
                   }
                  ?></h4>
              </div>
            </div>
            <?php
            endif;?>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong> <span>{{$portfolio->categories->name}}</span></li>
              <li><strong>Client</strong> <span>{{$portfolio->clients->name}}</span></li>
              <li><strong>Project date</strong> <span>{{$portfolio->created_at}}</span></li>
              <li><strong>Project URL</strong> <a href="#">{{$portfolio->project_url}}</a></li>
              <li><a href="{{$portfolio->project_url}}" class="btn-visit align-self-start">Visit Website</a></li>
            </ul>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->
@endsection
