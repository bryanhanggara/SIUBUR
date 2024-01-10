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

            
              <div class="card-body">
                <h5 class="card-title">{{$buruh->name}} <span>| This Year</span></h5>

                <div class="d-flex align-items-center">
                    <form action="{{route('data.update' , $buruh->id)}}" method="post">
                        @csrf
                        @method('put')
                        <label for="jabatan_id">Posisi : </label>
                        <select name="jabatan_id" class="form-control mt-3">
                            <option value="{{$buruh->jabatan_id}}">Pilih Posisi</option>
                            @foreach ($jabatan as $item)
                                <option value="{{$item->id}}">
                                    {{$item->nama_jabatan}}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success mt-3 ">Submit</button>
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