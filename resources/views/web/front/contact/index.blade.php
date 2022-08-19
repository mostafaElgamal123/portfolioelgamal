@extends('web.front.master')


@section('title','contact')

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
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis dolorem dolore earum</p>
        </div>

        <div class="row gx-lg-0 gy-4">

        <div class="col-lg-4">

          <div class="info-container d-flex flex-column align-items-center justify-content-center">
            <div class="info-item d-flex">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h4>Location:</h4>
                <p>@if(isset($media->location)) {{$media->location}} @endif</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h4>Email:</h4>
                <p>@if(isset($media->email)) {{$media->email}} @endif</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-phone flex-shrink-0"></i>
              <div>
                <h4>Call:</h4>
                <p>@if(isset($media->phone)) {{$media->phone}} @endif</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-clock flex-shrink-0"></i>
              <div>
                <h4>Open Hours:</h4>
                <p>@if(isset($media->open_hours)) {{$media->open_hours}} @endif</p>
              </div>
            </div><!-- End Info Item -->
          </div>

          </div>

          <div class="col-lg-8">
            <form id="SubmitForm" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" value="{{old('subject')}}" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" id="message" value="{{old('message')}}" rows="7" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                    <div class="error-message d-none"></div>
                    <div class="sent-message"></div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->
@endsection

@section('ajax')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
  $('#SubmitForm').on('submit',function(e){
    e.preventDefault();

    let name = $('#name').val();
    let email = $('#email').val();
    let subject = $('#subject').val();
    let message = $('#message').val();
    $.ajax({
      url: "http://127.0.0.1:8000/contacts",
      type:"post",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
        email:email,
        subject:subject,
        message:message,
      },
      success:function(response){
        if(response){
          $('.sent-message').css('display','block');
          $('.sent-message').text(response.success);
          $("#SubmitForm")[0].reset(); 
        }
      },
      });
    });
</script>
@endsection