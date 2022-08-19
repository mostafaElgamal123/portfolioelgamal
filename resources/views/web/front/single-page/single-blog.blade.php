@extends('web.front.master')


@section('title','blog Details')

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
<!-- ======= Blog Details Section ======= -->
<section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                <img src="{{url('Images/blog/'.$blog->image)}}" alt="" class="img-fluid">
              </div>

              <h2 class="title">{{$blog->title}}</h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{$blog->users->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">{{$blog->created_at}}</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">{{$blog->comments->count()}} Comments</a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
              <?php $content_1=explode("\n",$blog->description);
                  $content_2=implode('<p>',$content_1);
                  echo $content_2;
               ?>

                <blockquote>
                  <p>
                    Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.
                  </p>
                </blockquote>
                @foreach($blog->sectionblogs as $key=>$value)
                <h3>{{$value->title}}</h3>
                <?php $content_1=explode("\n",$value->description);
                  $content_2=implode('<p>',$content_1);
                  echo $content_2;
                ?>
                <?php if($key==0): ?>
                <img src="{{asset('assets/img/blog/blog-inside-post.jpg')}}" class="img-fluid" alt="">
                <?php endif; ?>
                @endforeach
              </div><!-- End post content -->

              <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End meta bottom -->

            </article><!-- End blog post -->

            <div class="post-author d-flex align-items-center">
              <img src="<?php if($blog->users->image!='team-3.jpg'): ?>{{url('/Images/user/'.$blog->users->image)}} <?php else: ?>{{url('/assets/img/team/'.$blog->users->image)}} <?php endif; ?>" class="rounded-circle flex-shrink-0" alt="">
              <div>
                <h4>{{$blog->users->name}}</h4>
                <div class="social-links">
                  <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                  <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                </div>
                <p>
                  Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                </p>
              </div>
            </div><!-- End post author -->

            <div class="comments">

              <h4 class="comments-count">{{$blog->comments->count()}} Comments</h4>
              @foreach($blog->comments as $comment)
              <div id="comment-1" class="comment">
                  <div class="d-flex">
                      <div class="comment-img"><img src="<?php if($comment->user->image!='team-3.jpg'): ?>{{url('/Images/user/'.$comment->user->image)}} <?php else: ?>{{url('/assets/img/team/'.$comment->user->image)}} <?php endif; ?>" alt=""></div>
                      <div>
                          <h5><a href="#!">{{$comment->user->name}}</a> <a href="#!" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                          <time datetime="2020-01-01">{{$comment->created_at}}</time>
                          <p>
                              {{$comment->body}}
                          </p>
                      </div>
                  </div>
                  <form class="reply_form_active" method="post" action="{{ route('reply.add') }}">
                      @csrf
                      <div class="form-group">
                          <input type="text" name="comment_body" class="form-control" placeholder="enter your reply" />
                          <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
                          <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                      </div>
                      <div class="form-group mt-2">
                          <input type="submit" class="btn btn-warning" value="Reply" />
                      </div>
                  </form>
                  @include('partials._comment_replies', ['comments' => $blog->comments, 'blog_id' => $blog->id])
              </div><!-- End comment #1 -->
              @endforeach
              <div class="reply-form">

                <h4>Comment</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="{{ route('comment.add') }}" method="post">
                   @csrf
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*">
                      <input name="blog_id" value="{{$blog->id}}" type="hidden" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input name="website" type="text" class="form-control" placeholder="Your Website">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Post Comment</button>

                </form>

              </div>

            </div><!-- End blog comments -->

          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="" class="mt-3">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <div class="sidebar-item categories">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="mt-3">
                  @foreach($category as $cate)
                  <li><a href="#">{{$cate->name}} <span>({{$cate->blogs->count()}})</span></a></li>
                  @endforeach
                </ul>
              </div><!-- End sidebar categories-->

              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Recent Posts</h3>

                <div class="mt-3 mb-3 d-flex flex-column">
                    @foreach($blog_all as $blog_al)
                    <div class="post-item mt-3">
                        <img src="{{url('Images/blog/'.$blog_al->image)}}" alt="">
                        <div>
                            <h4><a href="{{url('blogs/'.$blog_al->id)}}">{{$blog_al->title}}</a></h4>
                            <time datetime="2020-01-01">{{$blog_al->created_at}}</time>
                        </div>
                    </div><!-- End recent post item-->
                    @endforeach
                </div>

              </div><!-- End sidebar recent posts-->

              <!-- <div class="sidebar-item tags">
                <h3 class="sidebar-title">Tags</h3>
                <ul class="mt-3">
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div>End sidebar tags -->

            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->
@endsection
