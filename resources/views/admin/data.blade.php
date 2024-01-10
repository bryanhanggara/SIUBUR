@extends('layouts.admin')

@section('content')
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
        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

             <a href="{{route('data.index')}}">
              <div class="card-body">
                <h5 class="card-title">Total Karyawan <span>| This Year</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$user}}</h6>
                    <span class="text-muted small pt-2 ps-1">Buruh</span>

                  </div>
                </div>

              </div>
             </a>

            <div class="container">
                <table class="table">
                    <thead class="table-primary">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </thead>
                    <tbody>
                        @foreach ($buruhs as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    @if ($item->jabatan_id == null)
                                        <span class="badge text-bg-danger">Tidak Aktif</span>
                                    @else
                                        <span class="badge text-bg-info text-white">Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('data.edit', $item->id)}}" class="btn btn-warning">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                     </tbody>
                 </table>
            </div>
            </div>

          </div><!-- End Customers Card -->
        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>
@endsection