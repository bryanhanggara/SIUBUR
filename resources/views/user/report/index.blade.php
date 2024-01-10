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
              <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
  
                  <div class="rejam">
                    <div class="row-time">
                      <div class="kerja">
                        <p class="jam-kerja">Jam Kerja </p>
                        <p class="item--C5">|</p>
                        <p class="bulan-ini-vX">Bulan Ini</p>
                      </div>
                      <div class="auto-group-ktw">
                        <p class="item-10">{{$selisihJam}}</p>
                        <p class="jam-uX">Jam</p>
                      </div>
                    </div>
                    <p class="tanggal-yh">{{$formattedDate}}</p>
                  </div>
  
                </div>
              </div>
  
              <!-- Revenue Card -->
              <div class="col-xxl-8 col-md-8">
                <div class="card info-card revenue-card" style="padding: 35px;">
  
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
              </div><!-- End Revenue Card -->
  
              <!-- Customers Card -->
              <div class="col-xxl-12 col-xl-12">
  
                <div class="card info-card customers-card">
  
                  <div class="jam">
                    <div class="row-jam">
                      <div class="datang-atas">
                        <p class="jam-kerja-sJ9">Keuangan</p>
                        <p class="item--C5X">|</p>
                        <p class="hari-ini-vXK">Bulan Ini</p>
                      </div>
                      <div class="auto-group-ktwz-qeH">
                        <div class="group-6-nZX">
                          <img class="clock-regular-1-JGy" src="{{url('user_fe/assets/auto-group-bnx3.png')}}"/>
                        </div>
                        <p class="item-10-1BP">{{$totalGaji}}</p>
                        <p class="jam-uXf">Rupiah</p>
                      </div>
                    </div>
                  </div>
                </div>
  
              </div><!-- End Customers Card -->
  
  
              <div class="col-md-12">
                <div class="card info-card">
                    <div class="card-body">
                       <div class="row">
                            <div class="col-md-6">
                                <p class="title-latest">
                                    Riwayat Gaji Kamu
                                </p>
                            </div>
                       </div>
                       <br>
                       <table class="table">
                            <thead class="table-secondary">
                                <th>
                                    Hari
                                </th>
                                <th class="text-center">
                                    Tanggal
                                </th>
                                <th class="text-center">
                                    Bulan
                                </th>
                                <th class="text-center">
                                    Total Jam Kerja
                                </th>
                                <th class="text-center">
                                    Total Gaji
                                </th>
                            </thead>
                            <tbody>
                                @forelse ($absensiHistory as $item)
                                   <tr>
                                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('l') }}</td>
                                    <td class="text-center" >{{Carbon\Carbon::parse($item->created_at)->format('d') }}</td>
                                    <td class="text-center" >{{Carbon\Carbon::parse($item->created_at)->format('F') }}</td>
                                    <td class="text-center" >{{$item->selisih}} jam</td>
                                    <td class="text-center" >Rp. {{$item->gaji}}</td>
                                   </tr>
                                @empty
                                    <tr>
                                      <td colspan="12" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                       </table>
                    </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card info-card">
                    <div class="card-body">
                       <div class="row">
                            <div class="col-md-6">
                                <p class="title-latest">
                                   Laporan Diterima
                                </p>
                            </div>
                       </div>
                       <br>
                       <table class="table">
                        <thead>
                          <th>Judul</th>
                          <th>Download</th>
                        </thead>
                        <tbody>
                              @forelse ($reports as $item)
                                  <tr>
                                    <td>{{ \Illuminate\Support\Str::limit($item->judul, $limit = 25, $end = '...')}}</td>
                                    <td>
                                      <a href="{{ route('report.download', ['id' => $item->id]) }}" class="btn btn-view">Unduh Surat</a></td>
                                  </tr>
                              @empty
                                  <td colspan="12" class="text-center"> Kosong</td>
                              @endforelse
                        </tbody>
                     </table>
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