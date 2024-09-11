@extends('app')
@section('content')
<head>
    <!-- css untuk select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- jika menggunakan bootstrap4 gunakan css ini  -->
</head>
    <div class="container mt-5 mb-5">
        <div class="row">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Servis /</span> Tambah Servis</h4>
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <h5 class="fw-bold">Data Servis</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('servis.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            {{-- <div class="form-group mt-3">
                                {{-- <label class="font-weight-bold">Nota</label> --}}
                            {{-- <input type="hidden" class="form-select" name="id_nota" value="5" id="nama_jasa"> --}}
                            <!-- error message untuk stok -->
                            {{-- @error('nama_barang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Pelanggan</label>
                                <input type="text" class="form-control @error('pelanggan') is-invalid @enderror"
                                    name="pelanggan" value="{{ old('pelanggan') }}" placeholder="Masukkan Nama Pelanggan">

                                <!-- error message untuk pelanggan -->
                                @error('pelanggan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    name="tanggal" value="{{ old('tanggal') }}" placeholder="Masukkan Tanggal">

                                <!-- error message untuk tanggal -->
                                @error('tanggal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Plat</label>
                                <input type="text" class="form-control @error('plat') is-invalid @enderror"
                                    name="plat" value="{{ old('plat') }}" placeholder="Masukkan No Plat">

                                <!-- error message untuk plat -->
                                @error('plat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Telepon</label>
                                <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                                    name="telepon" value="{{ old('telepon') }}" placeholder="6287860958904">

                                <!-- error message untuk plat -->
                                @error('telepon')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Status</label>
                                <label>Status</label>
                                <input type="text" name="status" class="form-control" value="Pending" readonly>
                                <!-- error message untuk status -->
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="fw-bold">Data Jasa</h5>
                            </div>
                            <div class="card-body">
                                <div class="row clone-row">
                                    <div class="col-md-12 mb-4">
                                        <label>Nama Jasa</label>
                                        <select id="nama_jasa" name="nama_jasa[]" class="form-select" multiple>
                                            <option value="" holder>Pilih Nama Jasa</option>
                                            @foreach ($jasa as $d)
                                                <option value="{{ $d->id }}">{{ $d->nama_jasa_servis }}</option>
                                            @endforeach
                                        </select>
                                        <!-- error message untuk nama jasa -->
                                        @error('nama_jasa')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <!-- error message untuk stok -->
                                        @error('nama_jasa')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-md-1">
                                                <span class="btn btn-danger btn-xs pull-right btn-del-select py-0">Remove</span>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="margin-left: 5px;">
                                            <span class="btn btn-success btn-xs add-select py-0">Add More</span>
                                        </div> --}}
                                </div>
                            <div class="mt-3"></div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ url('servis') }}" class="btn btn-md btn-dark">Kembali</a>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $("#nama_jasa").select2({
            placeholder: "Pilih Nama Jasa",
            allowClear: true,
        });
    </script>
   
    <script>
        CKEDITOR.replace('statussssssssss');
    </script>
@endsection
