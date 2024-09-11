@extends('app')
@section('content')

    <head>
        <!-- css untuk select2 -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <!-- jika menggunakan bootstrap4 gunakan css ini  -->
    </head>
    @if (session('error'))
        <div class="bs-toast toast fade show bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Bootstrap</div>
                <small>1 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <form action="{{ route('nota.update', $nota->id) }}" method="POST" enctype="multipart/form-data">
        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
        @endif

        @csrf
        @method('put')
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Tambah Data Nota</h4>

                    <div class="card border-0 shadow rounded">
                        <div class="card-header">
                            <h5 class="fw-bold">Data Jasa Servis</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Jasa Servis</label>
                                <select class="form-select" name="servis_id" id="servis_id">
                                    <option value="" holder>Pilih Nama Jasa Servis</option>
                                    {{-- @foreach ($servis as $d)
                                        <option value="{{ $d->id }}" data-pelanggan="{{ $d->pelanggan }}"
                                            data-telepon="{{ $d->telepon }}">{{ $d->pelanggan }}</option>
                                    @endforeach --}}
                                    @foreach ($servis as $d)
                                        <option value="{{ $d->id }}" data-pelanggan="{{ $d->pelanggan }}"
                                            data-telepon="{{ $d->telepon }}"
                                            @if ($nota->servis_id == $d->id) selected @endif>{{ $d->pelanggan }}</option>
                                    @endforeach
                                </select>
                                </select>
                                <!-- error message untuk nama pegawai -->
                                @error('servis_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <br>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 mt-3">

                    <div class="card border-0 shadow rounded">
                        <div class="card-header">
                            <h5 class="fw-bold">Data Pelanggan</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <input class="form-control @error('pelanggan') is-invalid @enderror"
                                    placeholder="Masukkan Nama Pelanggan" value="{{ $nota->pelanggan }}" type="text"
                                    name="pelanggan" id="pelanggan" />

                                <!-- error message untuk pelanggan -->
                                @error('pelanggan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input class="form-control @error('telepon') is-invalid @enderror"
                                    placeholder="Masukkan Nomor Telepon" value="{{ $nota->telepon }}" type="text"
                                    name="telepon" id="telepon" onkeyup="sum();" />

                                <!-- error message untuk telepon -->
                                @error('telepon')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <?php old('status', $nota->status); ?>
                                    <option {{ $nota->status == 'Lunas' ? 'selected' : '' }} value="Lunas">Lunas
                                    </option>
                                    <option {{ $nota->status == 'Belum_Lunas' ? 'selected' : '' }} value="Belum_Lunas">
                                        Belum_Lunas</option>
                                </select>
                                <!-- error message untuk nama pegawai -->
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="fw-bold">Data Barang</h5>
                                </div>
                                <div class="card-body">
                                    @foreach ($nota->barang as $data)
                                        <div class="row wow">
                                            <div class="col-md-5 mb-4">
                                                <label class="form-label">Nama Barang</label>
                                                <select class="form-select" name="barang[]" id="nama_barang">
                                                    <option value="" holder>Pilih Nama Barang</option>
                                                    {{-- @foreach ($barang as $d)
                                                    <option data-harga_barang="{{ $d->harga_barang }}"
                                                        value="{{ $d->id }}">
                                                        {{ $d->nama_barang }}</option>
                                                @endforeach --}}
                                                    @foreach ($barang as $d)
                                                        <option value="{{ $d->id }}"
                                                            data-harga_barang="{{ $d->harga_barang }}"
                                                            {{-- @foreach ($nota->barang as $value) --}}
                                                            @if ($d->id == $data->id) selected @endif
                                                            {{-- @endforeach --}}>
                                                            {{ $d->nama_barang }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <!-- error message untuk jumlah -->
                                                @error('nama_barang')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            {{-- <div class="col-md-5 mb-4">
                                                <label class="form-label">Harga Barang</label>
                                                <input type="text"
                                                    class="form-control @error('harga') is-invalid @enderror harga-barang"
                                                    name="harga[]" value="{{ $data->pivot->harga }}"
                                                    placeholder="Masukkan jumlah">
                                                <br>
                                                <!-- error message untuk jumlah -->
                                                @error('jumlah')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div> --}}
                                            <div class="col-md-5 mb-4">
                                                <label class="form-label">Jumlah</label>
                                                <input type="text"
                                                    class="form-control @error('jumlah') is-invalid @enderror"
                                                    name="jumlah[]" value="{{ $data->pivot->jumlah }}"
                                                    placeholder="Masukkan jumlah">
                                                <br>
                                                <!-- error message untuk jumlah -->
                                                @error('jumlah')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-1">
                                                <span
                                                    class="btn btn-danger btn-xs pull-right btn-del-select1 py-0">Remove</span>
                                            </div>
                                        </div>
                                    @endforeach

                                    <p>Data Dibawah ini silahkan diisi jika terdapat tambahan barang dan silahkan diremove
                                        jika tidak terdapat tambahan</>
                                    <div class="row clone-row">
                                        <div class="col-md-5 mb-4">
                                            <label class="form-label">Nama Barang</label>
                                            <select class="form-select @error('barang') is-invalid @enderror"
                                                name="barang[]" id="barang">
                                                <option value="" holder>Pilih Nama Barang</option>
                                                {{-- @foreach ($barang as $d)
                                                <option data-harga_barang="{{ $d->harga_barang }}"
                                                    value="{{ $d->id }}">
                                                    {{ $d->nama_barang }}</option>
                                            @endforeach --}}
                                            {{-- data-harga_barang="{{ $barangs->harga_barang }}" --}}
                                                @foreach ($barang as $barangs)
                                                    <option value="{{ $barangs->id }}">{{ $barangs->nama_barang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <!-- error message untuk stok -->
                                            @error('nama_barang')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-md-5 mb-4">
                                            <label class="form-label">Harga Barang</label>
                                            <input type="text" class="form-control @error('harga') is-invalid @enderror harga-barang"
                                                name="harga[]" placeholder="Masukkan Stok" readonly>

                                            <!-- error message untuk stok -->
                                            @error('harga')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div> --}}
                                        <div class="col-md-5 mb-4">
                                            <label class="form-label">Jumlah</label>
                                            <input type="text"
                                                class="form-control @error('jumlah') is-invalid @enderror" name="jumlah[]"
                                                placeholder="Masukkan Stok">

                                            <!-- error message untuk stok -->
                                            @error('jumlah')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-1">
                                            <span
                                                class="btn btn-danger btn-xs pull-right btn-del-select py-0">Remove</span>
                                        </div>
                                    </div>

                                    <div class="col-md-2" style="margin-left: 5px;">
                                        <span class="btn btn-success btn-xs add-select py-0">Add More</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="card border-0 shadow rounded">
                            <div class="card-header">
                                <h5 class="fw-bold">Data Pegawai</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Pegawai</label>
                                    <select id="pegawai" name="pegawai[]" class="form-select" multiple>
                                        <option value="" holder>Pilih Nama Pegawai</option>
                                        {{-- @foreach ($pegawai as $d)
                                            <option value="{{ $d->id }}">{{ $d->nama_pegawai }}</option>
                                        @endforeach --}}
                                        @foreach ($pegawai as $d)
                                            <option value="{{ $d->id }}"
                                                @foreach ($nota->pegawai as $value)
                                            @if ($d->id == $value->id)
                                              selected
                                            @endif @endforeach>
                                                {{ $d->nama_pegawai }}</option>
                                        @endforeach
                                    </select>
                                    <!-- error message untuk nama pegawai -->
                                    @error('nama_pegawai')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn rounded-pill btn-primary mt-3">Simpan</button>
                                <a href="{{ url('nota') }}" class="btn btn-md btn-dark mt-3">Kembali</a>

                            </div>

                        </div>

                    </div>


    </form>
    </div>
    </div>
    </div>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $("#pegawai").select2({
            placeholder: "Pilih Nama Pegawai",
            allowClear: true,
        });
    </script>
    {{-- <script>
        $('.btn-del-select').hide();
        $(document).on('click', '.add-select', function() {
            $(this).parent().parent().find(".clone-row").clone().insertBefore($(this).parent()).removeClass(
                "clone-row");
            $('.btn-del-select').fadeIn();
            $(this).parent().parent().find(".btn-del-select").click(function(e) {
                $(this).parent().parent().remove();
            });
        });
    </script> --}}
    {{-- <script>
        $('.btn-del-select').hide();
        $(document).on('click', '.add-select', function() {
            var cloneRow = $(this).parent().parent().find(".clone-row").clone();
            cloneRow.insertBefore($(this).parent()).removeClass("clone-row");
            
            // Clear input values in the cloned row
            cloneRow.find('input[type="text"]').val('');
            cloneRow.find('select').val('');
            
            $('.btn-del-select').fadeIn();
    
            cloneRow.find(".btn-del-select").click(function(e) {
                $(this).parent().parent().remove();
            });
        });
    </script> --}}
    <script>
        // // Menangkap perubahan pada dropdown nama barang
        // $(document).on('change', '.form-select[name="barang[]"]', function() {
        //     var harga = $(this).find(':selected').data('harga_barang');
        //     $(this).closest('.clone-row').find('.harga-barang').val(harga);
        // });

        // Menambahkan row clone saat klik "Add More"
        $(document).on('click', '.add-select', function() {
            var cloneRow = $(this).closest('.card-body').find('.clone-row:first').clone();
            cloneRow.find('input').val('');
            cloneRow.find('.form-select').val('');
            cloneRow.insertAfter($(this).closest('.card-body').find('.clone-row:last'));
            // Clear input values in the cloned row
            cloneRow.find('input[type="text"]').val('');
            cloneRow.find('select').val('');
        });

        // Menghapus row clone saat klik "Remove"
        $(document).on('click', '.btn-del-select', function() {
            $(this).closest('.clone-row').remove();
        });
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js'></script>

    <script>
        $('#servis_id').on('change', function() {
            // ambil data dari elemen option yang dipilih
            const pelanggan = $('#servis_id option:selected').data('pelanggan');
            const telepon = $('#servis_id option:selected').data('telepon');

            // kalkulasi total harga
            // const totalDiscount = (price * discount / 100)
            // const total = price - totalDiscount;

            // tampilkan data ke element
            $('[name=pelanggan]').val(pelanggan);
            $('[name=telepon]').val(telepon);

            // $('#total').text(`Rp ${total}`);
        });
    </script>
    <script>
        // Menangkap perubahan pada dropdown nama barang
        $(document).on('change', '.form-select[name="barang[]"]', function() {
            var harga = $(this).find(':selected').data('harga_barang');
            $(this).closest('.wow').find('.harga-barang').val(harga);
        });

        // Menambahkan row clone saat klik "Add More"
        $(document).on('click', '.add-select', function() {
            var cloneRow = $(this).closest('.card-body').find('.wow:first').clone();
            cloneRow.find('input').val('');
            cloneRow.find('.form-select').val('');
            cloneRow.insertAfter($(this).closest('.card-body').find('.wow:last'));
            // Clear input values in the cloned row
            cloneRow.find('input[type="text"]').val('');
            cloneRow.find('select').val('');
        });

        // Menghapus row clone saat klik "Remove"
        $(document).on('click', '.btn-del-select1', function() {
            $(this).closest('.wow').remove();
        });
    </script>

@endsection
