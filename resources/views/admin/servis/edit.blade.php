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
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <h5 class="fw-bold">Data Servis</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('servis.update', $servis->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('put')
                            {{-- <div class="form-group mt-3">
                                {{-- <label class="font-weight-bold">Nota</label> --}}
                            {{-- <input type="hidden" class="form-select" name="id_nota" value="5" id="nama_jasa">
                                <!-- error message untuk stok -->
                                @error('nama_servis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Status</label>
                                <select name="status" class="form-control">
                                    <?php old('status', $servis->status); ?>
                                    <option {{ $servis->status == 'Confirm' ? 'selected' : '' }} value="Confirm">Confirm
                                    </option>
                                    <option {{ $servis->status == 'Pending' ? 'selected' : '' }} value="Pending">Pending
                                    </option>
                                    <option {{ $servis->status == 'Working' ? 'selected' : '' }} value="Working">Working
                                    </option>
                                    <option {{ $servis->status == 'Done' ? 'selected' : '' }} value="Done">Done
                                    </option>
                                    <option {{ $servis->status == 'Taken' ? 'selected' : '' }} value="Taken">Taken
                                    </option>
                                </select>
                                <!-- error message untuk status -->
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Pelanggan</label>
                                <input type="text" class="form-control @error('pelanggan') is-invalid @enderror"
                                    name="pelanggan" value="{{ $servis->pelanggan }}" placeholder="Masukkan Nama Pelanggan">

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
                                    name="tanggal" value="{{ $servis->tanggal }}" placeholder="Masukkan Tanggal">

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
                                    name="plat" value="{{ $servis->plat }}" placeholder="Masukkan No Plat">

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
                                    name="telepon" value="{{ $servis->telepon }}" placeholder="087860958904">

                                <!-- error message untuk plat -->
                                @error('telepon')
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
                                        <label class="form-label">Nama Jasa</label>
                                        <select class="form-select" name="nama_jasa[]" id="nama_jasa" multiple>
                                            <option value="" holder>Pilih Nama Jasa</option>
                                            @foreach ($jasa as $d)
                                                <option value="{{ $d->id }}"
                                                    @foreach ($servis->jasa as $value)
                                                        @if ($d->id == $value->id)
                                                          selected
                                                        @endif @endforeach>
                                                    {{ $d->nama_jasa_servis }}</option>
                                            @endforeach
                                        </select>
                                        <!-- error message untuk stok -->
                                        @error('nama_servis')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
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
    <script>
        $('.btn-del-select').hide();
        $(document).on('click', '.add-select', function() {
            $(this).parent().parent().find(".clone-row").clone().insertBefore($(this).parent()).removeClass(
                "clone-row");
            $('.btn-del-select').fadeIn();
            $(this).parent().parent().find(".btn-del-select").click(function(e) {
                $(this).parent().parent().remove();
            });
        });
    </script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $("#nama_jasa").select2({
            placeholder: "Pilih Nama Pegawai",
            allowClear: true,
        });
    </script>
@endsection
