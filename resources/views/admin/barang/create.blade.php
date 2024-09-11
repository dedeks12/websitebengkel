@extends('app')
@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Barang /</span> Tambah Barang</h4>
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header"><h5 class="fw-bold">Data Barang</h5></div>
                    <div class="card-body">
                        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Masukkan Nama Barang">
                            
                                <!-- error message untuk nama_barang -->
                                @error('nama_barang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Harga</label>
                                <input class="form-control @error('harga_barang') is-invalid @enderror" name="harga_barang" rows="5" placeholder="Masukkan Harga Barang" {{ old('harga_barang') }}>
                            
                                <!-- error message untuk harga_barang -->
                                @error('harga_barang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Stok</label>
                                <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" placeholder="Masukkan Stok Barang" {{ old('stok') }}>
                            
                                <!-- error message untuk harga_barang -->
                                @error('stok')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-3"></div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ url('barang')}}" class="btn btn-md btn-dark">Kembali</a>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'hhhhhhharga_barang' );
</script>
@endsection