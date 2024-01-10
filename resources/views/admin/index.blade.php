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

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

             <a href="{{route('data.index')}}">
              <div class="card-body">
                <h5 class="card-title">Total Karyawan <span>| This Year</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-fill-check"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$user}}</h6>
                    <span class="text-muted small pt-2 ps-1">Buruh</span>

                  </div>
                </div>

              </div>
             </a>
            </div>

          </div><!-- End Customers Card -->


          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
           <a href="{{route('data.buruh')}}">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Buruh Kasar<span>| Today</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$buruhKasar}}</h6>
                     <span class="text-muted small pt-2 ps-1">Orang</span>

                  </div>
                </div>
              </div>

            </div>
          </a>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
          <a href="{{route('data.operator')}}">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Operator <span>| Today</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$operator}}</h6>
                    <span class="text-muted small pt-2 ps-1">Orang</span>

                  </div>
                </div>
              </div>

            </div>
          </a>
          </div><!-- End Revenue Card -->

          
        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>
@endsection