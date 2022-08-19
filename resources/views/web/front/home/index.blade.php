@extends('web.front.master')


@section('title','home page')

@section('section-here')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                <h2>Welcome to <span>Impact</span></h2>
                <p>Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat.</p>
                <div class="d-flex justify-content-center justify-content-lg-start">
                <a href="#about" class="btn-get-started">Get Started</a>
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="assets/img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
            </div>
            </div>
        </div>

        <div class="icon-boxes position-relative">
            <div class="container position-relative">
            <div class="row gy-4 mt-5">

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-easel"></i></div>
                    <h4 class="title"><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                </div>
                </div>
                <!--End Icon Box -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-gem"></i></div>
                    <h4 class="title"><a href="" class="stretched-link">Sed ut perspiciatis</a></h4>
                </div>
                </div>
                <!--End Icon Box -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-geo-alt"></i></div>
                    <h4 class="title"><a href="" class="stretched-link">Magni Dolores</a></h4>
                </div>
                </div>
                <!--End Icon Box -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-command"></i></div>
                    <h4 class="title"><a href="" class="stretched-link">Nemo Enim</a></h4>
                </div>
                </div>
                <!--End Icon Box -->

            </div>
            </div>
        </div>

        </div>
    </section>
    <!-- End Hero Section -->
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

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-out">

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            @foreach($client as $clien)
            <div class="swiper-slide"><img src="{{'images/client/'.$clien->image}}" class="img-fluid" alt=""></div>
            @endforeach
          </div>
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4 align-items-center">

          <div class="col-lg-6">
            <img src="assets/img/stats-img.svg" alt="" class="img-fluid">
          </div>

          <div class="col-lg-6">

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Happy Clients</strong> consequuntur quae diredo para mesta</p>
            </div><!-- End Stats Item -->

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Projects</strong> adipisci atque cum quia aut</p>
            </div><!-- End Stats Item -->

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="453" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hours Of Support</strong> aut commodi quaerat</p>
            </div><!-- End Stats Item -->

          </div>

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
      <div class="container text-center" data-aos="zoom-out">
        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
        <h3>Call To Action</h3>
        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <a class="cta-btn" href="#">Call To Action</a>
      </div>
    </section><!-- End Call To Action Section -->

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
              <p>
              <?php $content_1=substr($servic->description,0,100);
                    echo $content_1."...";
                  ?>
              </p>
              <a href="{{url('services/'.$servic->id)}}" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->
        @endforeach
        </div>

      </div>
    </section><!-- End Our Services Section -->

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

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Pricing</h2>
          <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
        </div>

        <div class="row g-4 py-lg-5" data-aos="zoom-out" data-aos-delay="100">

          <div class="col-lg-4">
            <div class="pricing-item">
              <h3>Free Plan</h3>
              <div class="icon">
                <i class="bi bi-box"></i>
              </div>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> Quam adipiscing vitae proin</li>
                <li><i class="bi bi-check"></i> Nec feugiat nisl pretium</li>
                <li><i class="bi bi-check"></i> Nulla at volutpat diam uteera</li>
                <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4">
            <div class="pricing-item featured">
              <h3>Business Plan</h3>
              <div class="icon">
                <i class="bi bi-airplane"></i>
              </div>

              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> Quam adipiscing vitae proin</li>
                <li><i class="bi bi-check"></i> Nec feugiat nisl pretium</li>
                <li><i class="bi bi-check"></i> Nulla at volutpat diam uteera</li>
                <li><i class="bi bi-check"></i> Pharetra massa massa ultricies</li>
                <li><i class="bi bi-check"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4">
            <div class="pricing-item">
              <h3>Developer Plan</h3>
              <div class="icon">
                <i class="bi bi-send"></i>
              </div>
              <h4><sup>$</sup>49<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> Quam adipiscing vitae proin</li>
                <li><i class="bi bi-check"></i> Nec feugiat nisl pretium</li>
                <li><i class="bi bi-check"></i> Nulla at volutpat diam uteera</li>
                <li><i class="bi bi-check"></i> Pharetra massa massa ultricies</li>
                <li><i class="bi bi-check"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="content px-xl-5">
              <h3>Frequently Asked <strong>Questions</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>
          </div>

          <div class="col-lg-8">

            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
              @foreach($faq as $fa)
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{$loop->iteration}}">
                    <span class="num">{{$loop->iteration}}.</span>
                     {{$fa->question}}
                  </button>
                </h3>
                <div id="faq-content-{{$loop->iteration}}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    {{$fa->answer}}
                  </div>
                </div>
              </div><!-- # Faq item-->
              @endforeach
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-posts" class="recent-posts sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Recent Blog Posts</h2>
          <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto accusamus fugit aut qui distinctio</p>
        </div>

        <div class="row gy-4">
          @foreach($blog as $blo)
          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="{{'Images/blog/'.$blo->image}}" alt="" class="img-fluid">
              </div>

              <p class="post-category">{{$blo->categories->name}}</p>

              <h2 class="title">
                <a href="{{url('blogs/'.$blo->id)}}">{{$blo->title}}</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="<?php if($blo->users->image!='team-3.jpg'): ?>{{url('/Images/user/'.$blo->users->image)}} <?php else: ?>{{url('/assets/img/team/'.$blo->users->image)}} <?php endif; ?>" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">{{$blo->users->name}}</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">{{$blo->created_at}}</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->
          @endforeach
        </div><!-- End recent posts list -->

      </div>
    </section><!-- End Recent Blog Posts Section -->

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