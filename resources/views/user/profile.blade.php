@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{url('user_fe/page-1/style.css')}}">
<main id="main" class="main">
    <section class="section user-profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card info-card user-profile-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-image" style="width: 280px; height: 280px;">
                                        @php($image = auth()->user()->image_profile)

                                        <img class="d-block mx-auto mb-3" src="@if($image==null) https://i.pinimg.com/564x/95/6a/70/956a70720346ddfe6b9f6e8db71f46ff.jpg @else {{asset("storage/$image")}} @endif"
                                            alt="" style="width:100%; height: 100%; object-fit: cover;">
                                        </div>
                                </div>
                                <div class="col-md-8">
                                    <p>Nama: </p><h2 class="form-control">{{Auth::user()->name}}</h2>
                                    <p>Pekerjaan: </p><p class="form-control">{{Auth::user()->jabatan->nama_jabatan}}</p>
                                    <p>Jenis Kelamin: </p><p class="form-control">{{Auth::user()->jk}}</p>
                                    <p>Tempat, Tanggal Lahir </p><p class="form-control">{{Auth::user()->ttl}}, {{ \Carbon\Carbon::parse(Auth::user()->tanggal_lhr)->isoFormat('D MMMM YYYY') }}</p>
                                    <p>Alamat: </p><p class="form-control">{{Auth::user()->alamat}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection