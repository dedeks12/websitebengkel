@extends('app')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pegawai /</span> Edit Pegawai</h4>
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <h5 class="fw-bold">Data Pegawai</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Nama pegawai</label>
                                <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror"
                                    name="nama_pegawai" value="{{ $pegawai->nama_pegawai }}" placeholder="Masukkan Nama Pegawai">

                                <!-- error message untuk nama_pegawai -->
                                @error('nama_pegawai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Gaji</label>
                                <input type="text" class="form-control @error('gaji') is-invalid @enderror"
                                    name="gaji" value="{{ $pegawai->gaji }}" placeholder="Masukkan Gaji Pegawai">

                                <!-- error message untuk nama_pegawai -->
                                @error('gaji')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat" value="{{ $pegawai->alamat }}" placeholder="Masukkan Alamat Pegawai">

                                <!-- error message untuk nama_pegawai -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">no_ktp</label>
                                <input type="text" class="form-control @error('no_ktp') is-invalid @enderror"
                                    name="no_ktp" value="{{ $pegawai->no_ktp }}" placeholder="Masukkan No KTP Pegawai">

                                <!-- error message untuk nama_pegawai -->
                                @error('no_ktp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary mt-3">SIMPAN</button>
                            <a href="{{ url('pegawai')}}" class="btn btn-md btn-dark mt-3">KEMBALI</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('harga_pegawai');
    </script>
@endsection
