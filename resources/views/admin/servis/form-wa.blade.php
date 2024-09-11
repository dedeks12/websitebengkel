@extends('app')
@section('content')
<head>
    <!-- css untuk select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- jika menggunakan bootstrap4 gunakan css ini  -->
</head>
    <div class="container mt-5 mb-5">
        <div class="row">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Servis /</span> Kirim Servis</h4>
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <h5 class="fw-bold">Data Servis</h5>
                    </div>
                    <div class="card-body">
                        @php
                        $totalJasa = 0;
                    @endphp
                        @foreach ($servis->jasa as $jasas)
                        @php
                            $hargaJasa = $jasas->harga_jasa_servis;
                            $totalJasa += $hargaJasa;
                        @endphp
                    @endforeach

                        <form class="whatsapp-form">

                            {{-- @csrf
                        @method('put') --}}
                            <div class="form-group mt-3">
                                {{-- <label class="font-weight-bold">Nota</label> --}}
                                <input type="hidden" class="form-select" id="end" value="'Silahkan Konfirmasi Jasa Servis ini dengan ketik yes jika setuju dan no untuk tidak setuju">
                                <input type="hidden" class="form-select" id="konfirmasi" value="Dengan mengetik yes menandakan bahwa mobil sudah diterima di bengkel">
                                <input type="hidden" class="form-select" id="bayar" value="Silahkan mengunjungi bengkel untuk proses pembayaran atau mengunjungi http://127.0.0.1:8000/upload/create jika anda melakukan pembayaran via transfer">
                                <input type="hidden" class="form-select" id="info" value="Informasi lebih lanjut bisa anda dapatkan pada http://127.0.0.1:8000">
                                <input type="hidden" class="form-select" id="terimakasih" value="Sekian dan terimakasih'">

                                <!-- error message untuk stok -->
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Pelanggan</label>
                                <input type="text" id="pelanggan"
                                    class="form-control @error('pelanggan') is-invalid @enderror" name="pelanggan"
                                    value="{{ $servis->pelanggan }}" placeholder="Masukkan Judul Post">

                                <!-- error message untuk pelanggan -->
                                @error('pelanggan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Tanggal</label>
                                <input type="date" id="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                    value="{{ $servis->tanggal }}" placeholder="Masukkan Judul Post">

                                <!-- error message untuk tanggal -->
                                @error('tanggal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Plat</label>
                                <input type="text" id="plat"
                                    class="form-control @error('plat') is-invalid @enderror" name="plat"
                                    value="{{ $servis->plat }}" placeholder="Masukkan Judul Post">

                                <!-- error message untuk plat -->
                                @error('plat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Telepon</label>
                                <input type="text" id="wa_number"
                                    class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                                    value="{{ $servis->telepon }}" placeholder="087860958904">

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
                                    <div class="mb-4">
                                        <label class="form-label">Nama Jasa</label><br>
                                        <select class="form-select" name="nama_jasa[]" id="nama_jasa" multiple>
                                            <option value="" holder>Pilih Nama Jasa</option>
                                            @foreach ($jasa as $d)
                                                <option value="{{ $d->nama_jasa_servis }}"
                                                    @foreach ($servis->jasa as $value)
                                                        @if ($d->nama_jasa_servis == $value->nama_jasa_servis)
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
                                    <div class="form-group mt-3">
                                        <label class="font-weight-bold">Total Harga Servis</label>
                                        <input type="text" id="harga"
                                            class="form-control @error('pelanggan') is-invalid @enderror" value="{{$totalJasa}}"
                                             readonly>
        
                                        <!-- error message untuk pelanggan -->
                                        @error('pelanggan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                            </div>
                        </div>
                        </div>
                        <div class="mt-3"></div>
                        <a class="btn btn-success send_form" href="javascript:void" type="submit"
                            title="Send to Whatsapp">Send to
                            Whatsapp</a>
                            <a class="btn btn-dark" href="{{ url('servis')}}"
                            title="Send to Whatsapp">Kembali</a>                    
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
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
    <!-- partial -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="./script.js"></script>
    <script>
        $(document).on('click', '.send_form', function() {
            var input_blanter = document.getElementById('wa_number');

            /* Whatsapp Settings */
            var walink = 'https://web.whatsapp.com/send',
                phone = $("#wa_number").val(),
                walink2 = 'Halo Kami dari Bengkel Wahyu Pratama UD. Ingin Menyampaikan Kepada',
                text_yes = 'Terkirim.',
                text_no = 'Isi semua Formulir lalu klik Send.';

            /* Smartphone Support */
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                var walink = 'whatsapp://send';
            }

            if ("" != input_blanter.value) {

                /* Call Input Form */
                var input_status = $("#status").val(),
                    input_pelanggan = $("#pelanggan").val(),
                    input_tanggal = $("#tanggal").val(),
                    input_plat = $("#plat").val();
                input_jasa = $("#nama_jasa").val();
                input_harga = $("#harga").val();
                input_end = $("#end").val();
                input_konfirmasi = $("#konfirmasi").val();
                input_bayar = $("#bayar").val();
                input_info = $("#info").val();
                input_terimakasih = $("#terimakasih").val();



                /* Final Whatsapp URL */
                var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
                    '*Name* : ' + input_pelanggan + '%0A' +
                    '*Tanggal* : ' + input_tanggal + '%0A' +
                    '*NO Plat* : ' + input_plat + '%0A' +
                    '*Nama Servis* : ' + input_jasa + '%0A' +
                    '*Harga Servis* : ' + 'Rp.' + input_harga + '(*belum termasuk harga barang)'+ '%0A' +
                '*Keterangan* : ' + input_end + '%0A' + '%0A' 
                + input_konfirmasi + '%0A'
                + input_bayar + '%0A'+ input_info + '%0A'+ '%0A'+ input_terimakasih + '%0A'
                ;


                /* Whatsapp Window Open */
                window.open(blanter_whatsapp, '_blank');
                document.getElementById("text-info").innerHTML = '<span class="yes">' + text_yes + '</span>';
            } else {
                document.getElementById("text-info").innerHTML = '<span class="no">' + text_no + '</span>';
            }
        });
    </script>
@endsection
