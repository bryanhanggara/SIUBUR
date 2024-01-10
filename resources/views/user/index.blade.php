@extends('layouts.app')

@section('content')
<main id="main" class="main">
  @if(session('success'))
  <script>
      Swal.fire({
          icon: 'success',
          text: '{{ session('success') }}'
      });
  </script>
  @endif

@if(session('error'))
  <script>
      Swal.fire({
          icon : 'error',
          text: '{{session('error')}}'
      });
  </script>
@endif

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-5">
              <div class="card info-card sales-card">

              <div class="card-header">
                 <span>Hai {{Auth::user()->roles}}!</span> <br>
                 Segera Periksa Daftar kehadiran Anda
              </div>

              <div class="card-body">
                <div class="row">
                    <div class="col">
                      <div class="profile-image" style="width: 120px; height: 120px;">
                        @php($image = auth()->user()->image_profile)

                        <img class="d-block mx-auto mb-3" src="@if($image==null) https://i.pinimg.com/564x/95/6a/70/956a70720346ddfe6b9f6e8db71f46ff.jpg @else {{asset("storage/$image")}} @endif"
                            alt="" style="width:100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col text-center">
                        <br>
                        <span>{{Auth::user()->name}}</span> <br>
                        @if ($checkjabatan == null)
                            Belum ada posisi
                        @else
                           {{Auth::user()->jabatan->nama_jabatan}}
                        @endif
                    </div>
                </div>
                <div class="view-profile text-center mt-5">
                  <a href="{{ route('profile.index', ['username' => str_replace(' ', '_', Auth::user()->name)]) }}" class="btn btn-view">
                    Lihat Profil
                  </a>
                </div>
              </div>
            </div>


            <div class="card-time">
              <p class="waktu">Waktu</p>
              <div class="time-row">
                <p class="clock" id="jam"></p>
                <p class="gmt">WIB</p>
              </div>
              <p class="tanggal">{{$formattedDate}}</p>
            </div>
              
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-7">
              <div class="card info-card revenue-card">

                <div class="jam">
                  <div class="row-jam">
                    <div class="datang-atas">
                      <p class="jam-kerja-sJ9">Jam Kerja </p>
                      <p class="item--C5X">|</p>
                      <p class="hari-ini-vXK">Hari Ini</p>
                    </div>
                    <div class="auto-group-ktwz-qeH">
                      <div class="group-6-nZX">
                        <img class="clock-regular-1-JGy" src="{{url('user_fe/assets/clock-regular-1.png')}}"/>
                      </div>
                      <p class="item-10-1BP">{{{$selisihJam}}}</p>
                      <p class="jam-uXf">Jam</p>
                    </div>
                  </div>

              </div>
            </div><!-- End Revenue Card -->


            

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="jam">
                  <div class="row-jam">
                    <div class="datang-atas">
                      <p class="jam-kerja-sJ9">Keuangan</p>
                      <p class="item--C5X">|</p>
                      <p class="hari-ini-vXK">Hari Ini</p>
                    </div>
                    <div class="auto-group-ktwz-qeH">
                      <div class="group-6-nZX">
                        <img class="clock-regular-1-JGy" src="{{url('user_fe/assets/auto-group-bnx3.png')}}"/>
                      </div>
                      <p class="item-10-1BP">{{$gaji}}</p>
                      <p class="jam-uXf">Rupiah</p>
                    </div>
                  </div>
              </div>

            </div><!-- End Customers Card -->


          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

   
</main><!-- End #main -->
    <script>
        function updateJam() {
            var date = new Date();
            var jam = date.getHours();
            var menit = date.getMinutes();
            var detik = date.getSeconds();

            var jamString = jam.toString().padStart(2, '0');
            var menitString = menit.toString().padStart(2, '0');
            var detikString = detik.toString().padStart(2, '0');

            var waktu = jamString + ':' + menitString + ':' + detikString;

            document.getElementById('jam').innerHTML = waktu;
        }

        setInterval(updateJam, 1000);
        updateJam(); 
    </script>
  

@endsection