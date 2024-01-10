@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Report </li>
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

                    <li><a class="dropdown-item" href="{{route('performance.create')}}">Buat Laporan</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Laporan Kinerja </h5>

                    <div class="d-flex align-items-center">
                        <table class="table">
                            <thead class="table-secondary">
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tertuju</th>
                                <th>Hapus </th>
                            </thead>
                            <tbody>
                                @foreach ($reports as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($item->judul, $limit = 20, $end = '...')}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>
                                            <form action="{{route('performance.destroy' , $item->id)}}" method="POST">
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