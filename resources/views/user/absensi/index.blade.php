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
      <h1>Absensi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Absensi</li>
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
                            Operator Gudang
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
                 <div class="row">
                      <div class="col">
                           <div class="card info-card revenue-card">
                              <div class="card-body">
                                  <p class="title-absen">Pekerjaan Kamu</p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="card-content">Lokasi</p>
                                      </div>
                                      <div class="col-md-8">
                                          <p>
                                              <b>PT Batta Merah</b>
                                          </p>
                                          <p>
                                              Jl. Merdeka Indrajaya, Kec. Dogan Ilir, Kota Lama Daerah Khusus Perkotaan
                                          </p>
                                          <a href="#">
                                              Lihat lokasi
                                          </a>
                                      </div>
                                  </div>
                              </div>
                           </div>
                      </div>
                 </div>
                 <div class="row">
                      <div class="col">
                          <div class="card info-card revenue-card">
                              <div class="card-body">
                                  <p class="title-absen">
                                      Kehadiran
                                  </p>
                                 <form action="{{ url('/absensi/masuk') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 justify-center card-radio text-center">
                                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                            <button type="submit" class="btn btn-view">Absensi Masuk</button>
                                        </div>
                                    </div>
                                      <div class="view-profile text-center mt-4">
                                
                                      </div>
                                 </form>
                                 <form action="{{ url('/absensi/pulang') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 card-radio text-center justify-center">
                                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                            <button type="submit" class="btn btn-view">Absensi Pulang</button>
                                        </div>
                                    </div>
                                      <div class="view-profile text-center mt-4">
                                
                                      </div>
                                 </form>
                              </div>
                          </div>
                      </div>
                 </div>
              </div><!-- End Revenue Card -->
              <div class="col-md-12">
                  <div class="card info-card">
                      <div class="card-body">
                         <div class="row">
                              <div class="col-md-6">
                                  <p class="title-latest">
                                      Kehadiran Absen
                                  </p>
                              </div>
                              {{-- <div class="col-md-3 title-date">
                                  <label for="">Dari : </label>
                                  <input type="date" name="" id="" class="form-control">
                              </div>
                              <div class="col-md-3 title-date">
                                  <label for="">Ke : </label>
                                  <input type="date" name="" id="" class="form-control">
                              </div> --}}
                         </div>
                         <br>
                         @if ($absensiHistory->count() > 0)
                         <table class="table">
                            <thead class="table-secondary">
                                <th>
                                    Tanggal
                                </th>
                                <th class="text-center">
                                    Jam Masuk
                                </th>
                                <th class="text-center">
                                    Jam Keluar
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($absensiHistory as $item)
                                    <tr>
                                        {{-- <td>{{ date('l, d-m-Y', strtotime($item->jam_masuk)) }}</td> --}}
                                        <td>{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
                                        <td class="text-center">{{$item->jam_masuk}}</td>
                                        <td class="text-center">{{$item->jam_pulang}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                       </table>
                         @else
                             
                         @endif
                      </div>
                  </div>
                  
              </div>
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