<nav id="navbar" class="navbar">
    <ul>
        <li><a href="{{route('index')}}">Home</a></li>
        <li><a href="{{route('about')}}">About</a></li>
        <li><a href="{{route('service')}}">Services</a></li>
        <li><a href="{{route('portfolio')}}">Portfolio</a></li>
        <li><a href="{{route('blog')}}">Blog</a></li>
        <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
        <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
            </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
        </ul>
        </li> -->
        <li><a href="{{route('contact')}}">Contact</a></li>
        @guest
          @if (Route::has('login'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}"><i class="fs-4 bi bi-box-arrow-in-right"></i> <span class="ms-2">{{ __('Login') }}</span></a>
              </li>
          @endif

          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}"><i class="fs-4 bi bi-box-arrow-in-right"></i> <span class="ms-2">{{ __('Register') }}</span></a>
              </li>
          @endif
      @else
          @if (Auth::user()->role=='1')
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('admin/dashborad') }}"><i class="fs-4 bi bi-box-arrow-in-right"></i> <span class="ms-2">{{ __('dashborad') }}</span></a>
              </li>
          @endif
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item ps-2" style="color:black;" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
    </ul>
</nav><!-- .navbar -->