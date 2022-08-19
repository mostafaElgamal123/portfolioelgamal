@extends('web.front.master')


@section('title','about us')


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
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-6">
            <h3>@if(isset($about[0]->title)) {{$about[0]->title}} @endif</h3>
            <img src="@if(isset($about[0]->image_left)){{'Images/about/'.$about[0]->image_left}} @endif" class="img-fluid rounded-4 mb-4" alt="">
            <?php 
            if(isset($about[0]->description_left)): 
                  $content_1=explode("\n",$about[0]->description_left);
                  $content_2=implode($content_1,'<p>');
                  echo $content_2;
            endif;
            ?>
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
              <p>@if(isset($about[0]->description_right)) {{$about[0]->description_right}} @endif</p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
              </p>

              <div class="position-relative mt-4">
                <img src="@if(isset($about[0]->image_right)) {{'Images/about/'.$about[0]->image_right}} @endif" class="img-fluid rounded-4" alt="">
                <a href="@if(isset($about[0]->video)) {{$about[0]->video}} @endif" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->
    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Team</h2>
          <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis dolorem dolore earum</p>
        </div>

        <div class="row gy-4">
          @foreach($team as $tea)
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <img src="{{'Images/team/'.$tea->image}}" class="img-fluid" alt="">
              <h4>{{$tea->title}}</h4>
              <span>{{$tea->description}}</span>
              <div class="social">
                <a href="{{$tea->twitter}}"><i class="bi bi-twitter"></i></a>
                <a href="{{$tea->facebook}}"><i class="bi bi-facebook"></i></a>
                <a href="{{$tea->instagram}}"><i class="bi bi-instagram"></i></a>
                <a href="{{$tea->linkedin}}"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div><!-- End Team Member -->
          @endforeach
        </div>

      </div>
    </section><!-- End Our Team Section -->
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Testimonials</h2>
          <p>Voluptatem quibusdam ut ullam perferendis repellat non ut consequuntur est eveniet deleniti fignissimos eos quam</p>
        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            @foreach($testimonial as $testimonia)
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <img src="{{'images/testimonial/'.$testimonia->image}}" class="testimonial-img flex-shrink-0" alt="">
                    <div>
                      <h3>{{$testimonia->title}}</h3>
                      <h4>{{$testimonia->location}}</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    {{$testimonia->description}}
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->
@endsection