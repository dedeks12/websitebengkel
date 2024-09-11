@extends('app')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nota /</span> Kirim Nota</h4>
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <h5 class="fw-bold">Data Nota</h5>
                    </div>
                    <div class="card-body">
                        <form class="whatsapp-form" enctype="multipart/form-data">
                            <div class="datainput">
                                <label for="">Nama Pelanggan</label>
                                <input class="validate form-control" id="wa_name" name="name"
                                    value="{{ $nota->pelanggan }}" required="" type="text" value='' />
                                <span class="highlight"></span><span class="bar"></span>
                            </div>
                            <div class="datainput">
                                <label for="">No Plat</label>
                                <input class="validate form-control" id="wa_plat" name="plat"
                                    value="{{ $nota->servis->plat }}" required="" type="text" value='' />
                                <span class="highlight"></span><span class="bar"></span>
                            </div>
                            <div class="datainput">
                                <label>No Telepon</label>
                                <input class="validate form-control" id="wa_number" name="count"
                                    value="{{ $nota->telepon }}" required="" type="number" value='' />
                                <span class="highlight"></span><span class="bar"></span>
                            </div>
                            <div class="datainput">
                                <label for="">Tanggal</label>
                                <input class="validate form-control" id="wa_tanggal" name="name"
                                    value="{{ $nota->created_at }}" required="" type="text" value='' />
                                <span class="highlight"></span><span class="bar"></span>
                            </div>
                             <input type="hidden" id="end"
                                value="Terimakasih Sudah Melakukan Servis Di Bengkel Kami">
                            <a class="btn btn-success send_form mt-3" href="javascript:void" type="submit"
                                title="Send to Whatsapp">Send to
                                Whatsapp</a>
                                <a class="btn btn-dark mt-3" href="{{url('nota')}}"
                                title="Send to Whatsapp">Kembali</a>
                            <div id="text-info"></div>
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
                walink2 = 'Halo Kami Dari Bengkel Wahyu Pratama UD ingin memberikan Nota Kepada ',
                text_yes = 'Terkirim.',
                text_no = 'Isi semua Formulir lalu klik Send.';


            /* Smartphone Support */
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                var walink = 'whatsapp://send';
            }

            if ("" != input_blanter.value) {

                /* Call Input Form */
                var input_name1 = $("#wa_name").val(),
                    input_plat = $("#wa_plat").val(),
                    input_number1 = $("#wa_number").val(),
                    input_tanggal = $("#wa_tanggal").val(),
                    input_textarea1 = $("#end").val();

                /* Final Whatsapp URL */
                var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
                    '*Name* : ' + input_name1 + '%0A' +
                    '*No Plat* : ' + input_plat + '%0A' +
                    '*Telepon* : ' + input_number1 + '%0A' +
                    '*Tanggal* : ' + input_tanggal + '%0A' +
                    input_textarea1 + '%0A';

                /* Whatsapp Window Open */
                window.open(blanter_whatsapp, '_blank');
                document.getElementById("text-info").innerHTML = '<span class="yes">' + text_yes + '</span>';
            } else {
                document.getElementById("text-info").innerHTML = '<span class="no">' + text_no + '</span>';
            }
        });
    </script>
@endsection
