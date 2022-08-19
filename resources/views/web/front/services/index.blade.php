@extends('web.front.master')


@section('title','service')

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
  <!-- ======= Our Services Section ======= -->
  <section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Our Services</h2>
        <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
      </div>

      <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

      @foreach($service as $servic)
        <div class="col-lg-4 col-md-6">
          <div class="service-item  position-relative">
            <div class="icon">
              <!-- <i class="bi bi-activity"></i> -->
              <img src="{{'images/service/'.$servic->image}}" alt="" style="z-index:2; position: relative;">
            </div>
            <h3>{{$servic->title}}</h3>
            <p><?php $content_1=substr($servic->description,0,100);
                    echo $content_1."...";
                  ?></p>
            <a href="{{url('services/'.$servic->id)}}" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->
      @endforeach
      </div>

    </div>
  </section><!-- End Our Services Section -->
@endsection
