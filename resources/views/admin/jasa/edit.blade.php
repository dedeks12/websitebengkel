@extends('app')
@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Jasa /</span> Edit Jasa</h4>
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header"><h5 class="fw-bold">Data Jasa</h5></div>
                    <div class="card-body">
                        <form action="{{ route('jasa.update',$jasa->id) }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Nama jasa</label>
                                <input type="text" class="form-control @error('nama_jasa_servis') is-invalid @enderror" name="nama_jasa_servis" value="{{ $jasa->nama_jasa_servis }}" placeholder="Masukkan Nama Jasa Servis">
                            
                                <!-- error message untuk nama_jasa_servis -->
                                @error('nama_jasa_servis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Harga</label>
                                <input type="text" class="form-control @error('harga_jasa_servis') is-invalid @enderror" name="harga_jasa_servis" value="{{ $jasa->harga_jasa_servis }}" placeholder="Masukkan Harga Jasa Servis">
                            
                                <!-- error message untuk harga_jasa_servis -->
                                @error('harga_jasa_servis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-3"></div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ url('jasa')}}" class="btn btn-md btn-dark">Kembali</a>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    CKEDITOR.replace( 'harga_jasa_servissssssssss' );
</script>
@endsection