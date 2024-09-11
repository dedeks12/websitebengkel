@extends('app')
@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Upload /</span> Tambah Upload</h4>
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header"><h5 class="fw-bold">Data Upload</h5></div>
                    <div class="card-body">
                        <form action="{{ route('upload.masuk') }}" method="Anda" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Anda">
                            
                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Foto</label>
                                <input class="form-control @error('telepon') is-invalid @enderror" name="telepon" rows="5" placeholder="Masukkan Telepon Anda" {{ old('telepon') }}>
                            
                                <!-- error message untuk telepon -->
                                @error('telepon')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Plat</label>
                                <input type="text" class="form-control @error('plat') is-invalid @enderror" name="plat" rows="5" placeholder="Masukkan No Plat Anda" {{ old('plat') }}>
                            
                                <!-- error message untuk telepon -->
                                @error('plat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" rows="5" placeholder="Masukkan Tanggal" {{ old('tanggal') }}>
                            
                                <!-- error message untuk telepon -->
                                @error('tanggal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="number" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Masukkan Alamat Anda" {{ old('alamat') }}>
                            
                                <!-- error message untuk telepon -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-3"></div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'hhhhhhtelepon' );
</script>
@endsection