@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Jabatan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Jabatan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
        <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                <div class="card-body">
                    <h5 class="card-title">Tambah Posisi</h5>

                    <div class="posisi">
                       <form action="{{route('jabatan.store')}}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="nama_jabatan">Posisi : </label>
                                    <input type="text" name="nama_jabatan" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="gaji">Gaji : </label>
                                    <input type="text" name="gaji" class="form-control">
                                </div>
                            </div> <br>
                            <button type="submit" class="btn btn-primary">
                                Tambah
                            </button>
                       </form>
                    </div>

                </div>
                </div>

            </div><!-- End Customers Card -->
          
        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>
@endsection