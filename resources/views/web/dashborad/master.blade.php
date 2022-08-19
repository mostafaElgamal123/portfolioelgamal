<!DOCTYPE html>
<html lang="en">
@include('web.dashborad.layout.head')
<body class="hold-transition sidebar-mini layout-fixed">


<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('assets/img/favicon.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>
  @include('web.dashborad.layout.header')
  @include('web.dashborad.layout.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">@yield('breadcrumb')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('web.dashborad.layout.footer')
  </div>


@include('web.dashborad.layout.footer.vendors')
@include('web.dashborad.layout.footer.main-js')
</body>

</html>