<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Karyawan Batta</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('user_fe/NiceAdmin/assets/img/favicon.png')}}" rel="icon">
  <link href="{{url('user_fe/NiceAdmin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('user_fe/NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('user_fe/NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('user_fe/NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('user_fe/NiceAdmin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{url('user_fe/NiceAdmin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{url('user_fe/NiceAdmin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{url('user_fe/NiceAdmin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('user_fe/NiceAdmin/assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">SIUBUR</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="https://ui-avatars.com/api/{{Auth::user()->name}}"alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Lainnya</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <button class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#settingModal" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </button>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}"   onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('home.user') ? 'active text-white' : '' }}" href="{{route('home.user')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      <!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('absen.index') ? 'active text-white' : '' }}" href="{{route('absen.index')}}">
          <i class="bi bi-people"></i>
          <span>Absensi</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('report') ? 'active text-white' : '' }}" href="{{route('report')}}">
          <i class="bi bi-file-text"></i>
          <span>Report</span>
        </a>
      </li>

    </ul>
  </aside><!-- End Sidebar-->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Batta</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">SIUBUR</a>
    </div>
  </footer><!-- End Footer -->

   <!--Modal-->
   <div class="modal fade " id="settingModal" tabindex="-1" aria-labelledby="settingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-xxl-down">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="settingModalLabel">Pengaturan Profile</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container light-style flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-4">
                
            </h4>
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-toggle="list"
                                href="#account-general">General</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list"
                                href="#account-change-password">Ubah password</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="account-general">
                                <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('put')
                                  <div class="card-body media align-items-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt
                                        class="d-block ui-w-80" style="width: 100px">
                                    <div class="media-body ml-4 mt-2">
                                        <label class="btn btn-outline-primary">
                                            Upload new photo
                                            <input type="file" name="image_profile" class="account-settings-fileinput" hidden >
                                        </label> &nbsp;
                                        <div class="alert alert-warning small mt-1" style="width: 50%">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Nama</label>
                                        <input value="{{old('name', Auth::user()->name)}}" type="text" name="name" id="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Alamat E-mail</label>
                                        <input type="text" class="form-control mb-1" name="email" value="{{old('email', Auth::user()->email)}}" disabled>
                                        {{-- <div class="alert alert-warning mt-3">
                                            Your email is not confirmed. Please check your inbox.<br>
                                            <a href="javascript:void(0)">Resend confirmation</a>
                                        </div> --}}
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control" name="jk" value="{{old('jk', Auth::user()->jk)}}">
                                    </div>
                                    <div class="form-group">
                                      <label class="form-label">Tempat Lahir</label>
                                      <input type="text" class="form-control mb-1" name="ttl" value="{{old('alamat', Auth::user()->ttl)}}">
                                    </div>

                                    <div class="form-group">
                                      <label class="form-label">Tanggal Lahir</label>
                                      <input type="date" class="form-control mb-1" name="tanggal_lhr" value="{{old('alamat', Auth::user()->tangal_lhr)}}">
                                    </div>

                                    <div class="form-group">
                                      <label class="form-label">Alamat</label>
                                      <input type="text" class="form-control mb-1" name="alamat" value="{{old('alamat', Auth::user()->alamat)}}">
                                  </div>
                                    <div class="form-group mt-4">
                                      <a class="btn btn-secondary" data-bs-dismiss="modal">Close<a>
                                        <button type="submit" class="btn btn-view" style="width: 200px;">Save changes</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="account-change-password">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label">Klik untuk ubah password</label>
                                        <div class="password-toggle">
                                          @if (Route::has('password.request'))
                                          <a class=" btn btn-primary mt-5 text-xs text-white border-b border-gray-400" href="{{ route('password.request') }}">
                                                              {{ __('Forgot Your Password?') }}
                                          </a>
                                      @endif
                                        </div>
                                    </div>
                                </div>
                            </div>                                                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        </div>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('user_fe/NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{url('user_fe/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('user_fe/NiceAdmin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{url('user_fe/NiceAdmin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{url('user_fe/NiceAdmin/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{url('user_fe/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{url('user_fe/NiceAdmin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{url('user_fe/NiceAdmin/assets/vendor/php-email-form/validate.js')}}"></script>

  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript"></script>
  <script src="{{url('passwordToggle.js')}}"></script>  
  <!-- Template Main JS File -->
  <script src="{{url('user_fe/NiceAdmin/assets/js/main.js')}}"></script>
  @include('sweetalert::alert')
</body>

</html>

{{-- <form action="{{route('profile.update')}}" method="post">
  @csrf
  @method('put')
  <div class="card-body media align-items-center">
    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt
        class="d-block ui-w-80" width="100px">
    <div class="media-body ml-4 mt-2">
        <label class="btn btn-outline-primary">
            Upload new photo
            <input type="file" class="account-settings-fileinput" hidden>
        </label> &nbsp;
    <div class="alert alert-warning mt-2" style="width: 50%">Allowed JPG, GIF or PNG. Max size of 800K</div>
  </div>

  <hr class="border-light m-0">
  <div class="card-body">
      <div class="form-group">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control">
      </div>
      <div class="form-group">
          <label class="form-label">Alamat E-mail</label>
          <input type="text" class="form-control mb-1">
          <div class="alert alert-warning mt-3">
              Your email is not confirmed. Please check your inbox.<br>
              <a href="javascript:void(0)">Resend confirmation</a>
          </div>
      </div>
      <div class="form-group">
          <label class="form-label">Alamat</label>
          <input type="text" class="form-control mb-1">
      </div>
      <div class="form-group">
          <label class="form-label">No Telepon</label>
          <input type="text" class="form-control">
      </div>
      <a class="btn btn-secondary" data-bs-dismiss="modal">Close<a>
      <button type="button" class="btn btn-view" style="width: 200px;">Save changes</button>
  </div>
</form> --}}