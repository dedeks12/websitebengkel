@extends('app')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pegawai /</span> Tambah Pegawai</h4>
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <h5 class="fw-bold">Data Pegawai</h5>
                    </div>
                    <div class="card-body">
                        <form class="whatsapp-form">
                            <div class="datainput">
                                <input class="validate form-control" id="wa_name" name="name" value="{{$nota->pelanggan}}" required=""
                                    type="text" value='' />
                                <span class="highlight"></span><span class="bar"></span>
                                <label>Your Name</label>
                            </div>
                            <div class="datainput">
                                <input class="validate form-control" id="wa_number" name="count" value="{{$nota->telepon}}" required=""
                                    type="number" value='' />
                                <span class="highlight"></span><span class="bar"></span>
                                <label>Input Number</label>
                            </div>
                            <div class="datainput">
                                <input class="validate form-control" id="wa_email" name="count" required=""
                                    type="file" value='' />
                                <span class="highlight"></span><span class="bar"></span>
                                <label>Input Number</label>
                            </div>
                            <div class="datainput">
                                <textarea id='wa_textarea' placeholder='' maxlength='5000' row='1' required=""></textarea>
                                <span class="highlight form-control"></span><span class="bar"></span>
                                <label>Description</label>
                            </div>
                            <a class="btn btn-success send_form" href="javascript:void" type="submit" title="Send to Whatsapp">Send to
                                Whatsapp</a>
                            <div id="text-info"></div>
                        </form>
                    </div>
                </div></div></div></div>
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
                                     var input_name1 = $("#wa_name").val(),
                                        input_email1 = $("#wa_email").val(),
                                        input_number1 = $("#wa_number").val(),
                                        input_textarea1 = $("#wa_textarea").val();

                                    /* Final Whatsapp URL */
                                    var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
                                        '*Name* : ' + input_name1 + '%0A' +
                                        '*Email Address* : ' + input_email1 + '%0A' +
                                        '*Input Number* : ' + input_number1 + '%0A' +
                                        '*Description* : ' + input_textarea1 + '%0A';

                                    /* Whatsapp Window Open */
                                    window.open(blanter_whatsapp, '_blank');
                                    document.getElementById("text-info").innerHTML = '<span class="yes">' + text_yes + '</span>';
                                } else {
                                    document.getElementById("text-info").innerHTML = '<span class="no">' + text_no + '</span>';
                                }
                            });
                        </script>
@endsection
