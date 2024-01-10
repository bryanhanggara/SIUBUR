@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Report</li>
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
                    <h5 class="card-title">Buat Laporan Buruh</h5>

                    <div class="posisi">
                        <label for="">Cari Nama</label>
                        <div class="form-group">
                            <input type="text" id="searchInput" onkeyup="filterOptions()" placeholder="Cari User" class="form-control">
                        </div>
                       <form action="{{route('performance.store')}}" method="POST">
                        @csrf
                            <div class="form-group mt-3">
                                <label for="user_id">Nama Buruh</label>
                                <select class="form-control" name="user_id" id="user_id" onchange="filterOptions()">
                                <option value="">Pilih Buruh</option>
                                @foreach ($users as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="judul">Judul laporan</label>
                                <input type="text" name="judul" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="content">Isi Laporan</label>
                                <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">
                                Kirim
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

  <script>
    // Fungsi untuk menyaring opsi dropdown berdasarkan input pengguna
    function filterOptions() {
        var input, filter, select, options, option, i;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        select = document.getElementById("user_id");
        options = select.getElementsByTagName("option");

        for (i = 0; i < options.length; i++) {
            option = options[i];
            if (option.innerHTML.toUpperCase().indexOf(filter) > -1) {
                option.style.display = "";
            } else {
                option.style.display = "none";
            }
        }
    }
</script>

@endsection