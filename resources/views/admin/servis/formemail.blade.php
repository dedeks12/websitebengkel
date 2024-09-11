@extends('app')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Servis /</span> Tambah Servis</h4>
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <h5 class="fw-bold">Data Servis</h5>
                    </div>
                    <div class="card-body">
                        <form class="whatsapp-form">

                            {{-- @csrf
                        @method('put') --}}
                            <div class="form-group mt-3">
                                {{-- <label class="font-weight-bold">Nota</label> --}}
                                <input type="hidden" class="form-select" name="id_nota" value="5" id="nama_jasa">
                                <!-- error message untuk stok -->
                                @error('nama_servis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="font-weight-bold">Status</label>
                                <input type="text" id="status"
                                    class="form-control @error('status') is-invalid @enderror" name="status"
                                    value="{{ $servis->status }}" placeholder="Masukkan Judul Post">

                                <!-- error message untuk status -->
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
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
                                    <div class="col-md-5 mb-4">
                                        <label class="form-label">Nama Jasa</label>
                                        <select class="form-select" id="jasa" name="jasa[]">
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
                                    <div class="col-md-1">
                                        <span class="btn btn-danger btn-xs pull-right btn-del-select py-0">Remove</span>
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-left: 5px;">
                                    <span class="btn btn-success btn-xs add-select py-0">Add More</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3"></div>
                        <a class="btn btn-success send_form" href="javascript:void" type="submit"
                            title="Send to Whatsapp">Send to
                            Whatsapp</a>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- partial -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="./script.js"></script>
    <script>
        $(document).on('click', '.send_form', function() {
            var input_blanter = document.getElementById('wa_number');

            /* Whatsapp Settings */
            var walink = 'https://web.whatsapp.com/send',
                phone = $("#wa_number").val(),
                walink2 = 'Halo saya ingin ',
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
                input_jasa = $("#jasa").val();


                /* Final Whatsapp URL */
                var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
                    '*Name* : ' + input_pelanggan + '%0A' +
                    '*Email Address* : ' + input_tanggal + '%0A' +
                    '*Input Number* : ' + input_plat + '%0A' +
                    '*Description* : ' + input_jasa + '%0A';
                '*Description* : ' + input_status + '%0A';


                /* Whatsapp Window Open */
                window.open(blanter_whatsapp, '_blank');
                document.getElementById("text-info").innerHTML = '<span class="yes">' + text_yes + '</span>';
            } else {
                document.getElementById("text-info").innerHTML = '<span class="no">' + text_no + '</span>';
            }
        });
    </script>
@endsection
