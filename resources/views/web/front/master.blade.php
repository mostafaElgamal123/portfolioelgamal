<!DOCTYPE html>
<html lang="en">
@include('web.front.layout.head')
<body>
  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">@if(isset($media->email)) {{$media->email}} @endif</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>@if(isset($media->phone)) {{$media->phone}} @endif</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
          <a href="@if(isset($media->twitter)) {{$media->twitter}} @endif" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="@if(isset($media->facebook)) {{$media->facebook}} @endif" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="@if(isset($media->instagram)) {{$media->instagram}} @endif" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="@if(isset($media->linkedin)) {{$media->linkedin}} @endif" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->
@include('web.front.layout.header')
@yield('section-here')
@yield('breadcrumbs')
<main id="main">
   @yield('content')
</main>
<!-- End #main -->

@include('web.front.layout.footer')
@yield('ajax')
</body>

</html>