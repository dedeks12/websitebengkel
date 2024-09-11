<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Edit Data Bukti Transfer</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{!! asset('assets/img/logo.png') !!}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{!! asset('assets/vendor/fonts/boxicons.css') !!}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{!! asset('assets/vendor/css/core.css') !!}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{!! asset('assets/vendor/css/theme-default.css') !!}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{!! asset('assets/css/demo.css') !!}" />

     <!-- Vendors CSS -->
     <link rel="stylesheet" href="{!! asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') !!}" />

     <link rel="stylesheet" href="{!! asset('assets/vendor/libs/apex-charts/apex-charts.css') !!}" />
 
     <!-- Page CSS -->
 
     <!-- Helpers -->
     <script src="{!! asset('assets/vendor/js/helpers.js') !!}"></script>
 
     <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
     <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
     <script src="{!! asset('assets/js/config.js') !!}"></script>
  </head>

  <body>
    <!-- Content -->
    <center>
    <div class="col-md-5 align-item-center justify-content-center">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card justify-content-center">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link">
                  <img src="{!! asset('assets/img/logo.png') !!}" width="165px" height="60px" alt="">
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Edit Data Bukti Transfer</h4>
                
              <form action="{{ route('upload.update', $upload->id) }}" enctype="multipart/form-data" class="mb-3" action="index.html" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label class="form-label d-flex justify-content-between">Nama</label>
                  <input value="{{ $upload->nama }}"
                    type="text"
                    class="form-control"
                    name="nama"
                    placeholder="Enter your username"
                  />
                </div>
                <div class="mb-3">
                  <label class="form-label d-flex justify-content-between">Bukti Pembayaran</label>
                  <div class="mb-1"></div>
                  <input value="{{ $upload->image }}" type="file" class="form-control @error('image') is-invalid @enderror" name="image"/>
                    <!-- error message untuk title -->
                    @error('image')
    <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
@enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label d-flex justify-content-between">Telepon</label>
                  <input value="{{ $upload->telepon }}" type="text" class="form-control" name="telepon" placeholder="087509890999" />
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label d-flex justify-content-between">Plat</label>
                  <input value="{{ $upload->plat }}" type="text" class="form-control" name="plat" placeholder="Masukan No Plat" />
                </div>

                <div class="mb-3">
                  <label for="" class="form-label d-flex justify-content-between">tanggal</label>
                  <input value="{{ $upload->tanggal }}" type="date" class="form-control" name="tanggal" placeholder="Masukan Tanggal" />
                </div>

                <div class="mb-3">
                  <label class="form-label d-flex justify-content-between">Alamat</label>
                  <div class="input-group input-group-merge">
                    <input value="{{ $upload->alamat }}"
                      type="text"
                      class="form-control"
                      name="alamat"
                      placeholder="Masukan Alamat"
                    />
                    
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label d-flex justify-content-between">Status</label>
                  <div class="input-group input-group-merge">
                    <select name="status" class="form-control">
                        <?php old('status', $upload->status); ?>
                <option {{ $upload->status == 'Pending' ? 'selected' : '' }}  value="Pending">Pending</option>
          <option {{ $upload->status == 'Success' ? 'selected' : '' }}  value="Success">Success</option>
                    </select>
                  </div>
                </div>

                <div class="mt-3"></div>
                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                <a href="{{ url('servis') }}" class="btn btn-md btn-dark">Kembali</a>
            </div>
              </form>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{!! asset('assets/vendor/libs/jquery/jquery.js') !!}"></script>
    <script src="{!! asset('assets/vendor/libs/popper/popper.js') !!}"></script>
    <script src="{!! asset('assets/vendor/js/bootstrap.js') !!}"></script>
    <script src="{!! asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') !!}"></script>

    <script src="{!! asset('assets/vendor/js/menu.js') !!}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{!! asset('assets/js/main.js') !!}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
