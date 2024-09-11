@extends('app')
@section('content')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    {{-- <div class="row"> --}}

    <div class="row">
      <!-- Order Statistics -->
      <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card h-50">
          <div class="card-header d-flex align-items-center justify-content-between pb-0">
            <div class="card-title mb-0">
              <h5 class="m-0 me-2">Servis Statistik</h5>
              <small class="text-muted">{{$total_servis}} Total Servis</small>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="align-items-center">
                <h2 class="">{{$servisCount}}</h2>
                <span>Total Servis Hari Ini</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ Order Statistics -->

      <!-- Expense Overview -->
      <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card h-50">
          <div class="card-header d-flex align-items-center justify-content-between pb-0">
            <div class="card-title mb-0">
              <h5 class="m-0 me-2">Nota Statistik</h5>
              <small class="text-muted">{{$nota}} Total Nota</small>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="align-items-center">
                <h2 class="">{{$today_nota}}</h2>
                <span>Total Nota Hari Ini</span>
                {{-- <h2 class="">{{$persentaselunas}}</h2>
                <span>Persentase Lunas Nota</span> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ Expense Overview -->

      <!-- Transactions -->
      <div class="col-md-6 col-lg-4 order-2 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Jumlah Data</h5>
          </div>
          <div class="card-body">
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded" />
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Barang</small>
                    <h6 class="mb-0">Jenis Barang</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                <h6 class="mb-0">{{$totalbarang}}</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Pegawai</small>
                    <h6 class="mb-0">Jumlah Pegawai</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">{{$pegawai}}</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="../assets/img/icons/unicons/chart.png" alt="User" class="rounded" />
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Nota</small>
                    <h6 class="mb-0">Jumlah Nota</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">{{$nota}}</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="../assets/img/icons/unicons/cc-success.png" alt="User" class="rounded" />
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Jasa</small>
                    <h6 class="mb-0">Jenis Jasa</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">{{$jasa}}</h6>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Bukti Transfer</small>
                    <h6 class="mb-0">Jumlah</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">{{$totalupload}}</h6>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Transactions -->
    </div>
  </div>
  <!-- / Content -->
@endsection