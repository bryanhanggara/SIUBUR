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
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
    @endif
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
        <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="{{route('jabatan.create')}}">Tambah Posisi Baru</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Jabatan Buruh</h5>

                    <div class="d-flex align-items-center">
                        <table class="table">
                            <thead class="table-secondary">
                                <th>No</th>
                                <th>Posisi</th>
                                <th>Gaji <span style="font-size: 12px; color: #525252;">/ Jam</span></th>
                                <th>Ubah</th>
                                <th>Hapus </th>
                            </thead>
                            <tbody>
                                @foreach ($jabatans as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->nama_jabatan}}</td>
                                        <td><b>Rp.</b> {{$item->gaji}}</td>
                                        <td>
                                            <a href="{{route('jabatan.edit' , $item->id)}}" class="btn btn-warning">
                                                <i class="bi bi-pen text-white"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{route('jabatan.destroy' , $item->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                </div>

            </div><!-- End Customers Card -->
          
        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>
@endsection