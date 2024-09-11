<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Informasi | Bengkel Wahyu Pratama UD.</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('layout/img/favicons/apple-touch-icon.png') !!}">
    <link rel="icon" type="image/png" sizes="32x32" href="{!! asset('assets/img/logo.png') !!}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('assets/img/logo.png') !!}">
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('assets/img/logo.png') !!}">
    <link rel="manifest" href="{!! asset('layout/img/favicons/manifest.js') !!}on') !!}">
    <meta name="msapplication-TileImage" content="{!! asset('layout/img/favicons/mstile-150x150.png') !!}">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{!! asset('layout/css/theme.css') !!}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('layout/css/swiper-bundle.min.css') }}">

</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand" href="index.html"><img src="{!! asset('assets/img/logo.png') !!}"
                        width="170px" height="50px" height="31" alt="logo" /></a>
                <button class="navbar-toggler" type="btn btn-pink" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon">
                    </span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="#feature">Pembayaran</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="#servis">Servis</a>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="#superhero">Layanan</a></li>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <section class="pt-7" id="home">
            <div class="container">
                <div class="row align-items-center">
                    <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block"
                        style="background-image:url('layout/img/category/shape.png');opacity:.5;filter: grayscale(100%);
                        -webkit-filter: grayscale(100%);
                        -moz-filter: grayscale(100%);
                        -ms-filter: grayscale(100%);
                        -o-filter: grayscale(100%);">
                    </div>
                    <div class="col-md-6 text-md-start text-center py-6">
                        <h1 class="mb-4 fs-9 fw-bold text-blue">Servis Mobil Terpercaya</h1>
                        <p class="mb-6 lead text-black text-blue">servis, perbaikan, pembaruan, semuanya<br
                                class="d-none d-xl-block" />di satu tempat! tempat terbaik untuk servis<br
                                class="d-none d-xl-block" />kendaraan anda.</p>
                        <div class="text-center text-md-start"><a class="btn btn-pink me-3 btn-lg" href="https://wa.me/6287860958904"
                                role="btn btn-pink">Hubungi Kami</a></div>
                    </div>
                    <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid" src="{!! asset('layout/img/43025.png') !!}"
                            alt="" /></div>
                </div>
            </div>
        </section>

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-3">
                    <div class="col-lg-4 col-sm-6 card1 align-items-center">
                        <div class="service-item rounded pt-3">
                            <div class="p-3 text-center">
                                <i class="fa fa-3x fa-user-tie text-white mb-4"></i>
                                <h5>Teknisi Handal</h5>
                                <p>Mempunyai jam terbang dan pengalaman yang berkualitas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 card2">
                        <div class="service-item rounded pt-3">
                            <div class="p-3 text-center">
                                <i class="fa fa-3x fa-utensils text-black mb-4"></i>
                                <h5 class="text-black">Kualitas Produk</h5>
                                <p class="text-black">Menggunakan produk dan servis yang terjamin dan terpercaya</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 card1">
                        <div class="service-item rounded pt-3">
                            <div class="p-3 text-center">
                                <i class="fa fa-3x fa-cart-plus text-white mb-4"></i>
                                <h5>Online Order</h5>
                                <p>Hubungi kami pada nomor telepon yang disediakan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        <!-- ============================================-->
        {{-- <section>
            <ul class="tilesWrap">
                <li>
                    <h2>01</h2>
                    <h3>Title 1</h3>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting   
                        industry. Lorem Ipsum has been the industry's standard dummy text ever 
                        since the 1500s.
                    </p>
                    <button>Read more</button>
                </li>
                <li>
                    <h2>02</h2>
                    <h3>Title 2</h3>
                    <p>
                        When an unknown printer took a galley of type and scrambled it to make 
                        a type specimen book. It has survived not only five centuries.
                    </p>
                    <button>Read more</button>
                </li>
                <li>
                    <h2>03</h2>
                    <h3>Title 3</h3>
                    <p>
                        But also the leap into electronic typesetting, remaining essentially 
                        unchanged. It was popularised in the 1960s.
                    </p>
                    <button>Read more</button>
                </li>
                <li>
                    <h2>04</h2>
                    <h3>Title 4</h3>
                    <p>
                        With the release of Letraset sheets containing Lorem Ipsum passages,  
                        and more recently with desktop publishing software like Aldus PageMaker 
                        including versions of Lorem Ipsum.
                    </p>
                    <button>Read more</button>
                </li>
            </ul>
            <!-- partial -->
        </section> --}}

        <!-- <section> begin ============================-->
        <section class="pt-5 pt-md-9 mb-6" id="feature">
            <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block background-position-top"
                style="background-image:url('layout/img/superhero/oval.png');opacity:.5; background-position: top !important ;filter: grayscale(100%);
                -webkit-filter: grayscale(100%);
                -moz-filter: grayscale(100%);
                -ms-filter: grayscale(100%);
                -o-filter: grayscale(100%);">
            </div>
            <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block"
                style="background-image:url('layout/img/category/shape.png');opacity:.5;filter: grayscale(100%);
                -webkit-filter: grayscale(100%);
                -moz-filter: grayscale(100%);
                -ms-filter: grayscale(100%);
                -o-filter: grayscale(100%);">
            </div>

            <!--/.bg-holder-->

            <div class="container">
                <div class="row md-m-25px-b m-45px-b justify-content-center text-center">

                    <div class="sec-title text-center mb50 wow bounceInDown animated mt-5" data-wow-duration="500ms">
                        <h2 style="margin-top: -2em;" class="text-blue strong">PEMBAYARAN</h2>
                        <h4 style="margin-bottom: 3em" class="text-blue strong">Berikut merupakan langkah-langkah
                            upload bukti transfer.</h4>
                    </div>
                    <hr>
                    <div class="banner">
                        <li style="--accent-color:#7895CB">
                            <div class="icon">01</div>
                            <div class="title">Transfer</div>
                            <div class="descr">Lakukan Transfer pada rekening yang sudah diberikan di whatshapp</div>
                        </li>
                        <li style="--accent-color:#4E4FEB">
                            <div class="icon">02</div>
                            <div class="title">Akses</div>
                            <div class="descr">Akses halaman yang sudah diberikan untuk mengirimkan bukti transfer
                            </div>
                        </li>
                        <li style="--accent-color:#2F58CD">
                            <div class="icon">03</div>
                            <div class="title">Formulir</div>
                            <div class="descr">Lakukan pengisian data yang sesuai pada formulir yang ditampilkan</div>
                        </li>
                        <li style="--accent-color:#0D1282">
                            <div class="icon">04</div>
                            <div class="title">Notifikasi</div>
                            <div class="descr">Kemudian pastikan Anda mendapatkan notifikasi data berhasil diupload
                            </div>
                        </li>
                        <li style="--accent-color:#071952">
                            <div class="icon">05</div>
                            <div class="title">Whatshapp</div>
                            <div class="descr">Kemudian Anda akan mendapatkan nota servis pada aplikasi whatshapp
                            </div>
                        </li>

                    </div>
                </div>
            </div>
        </section>
        <!-- partial -->

        <!-- ============================================-->
        <!-- <section> begin ============================-->

        <section style="margin-top: -2em;" id="servis">
            <div class="container">
                <div class="row md-m-25px-b m-45px-b justify-content-center text-center">

                    <div class="sec-title text-center mb50 wow bounceInDown animated mt-5" data-wow-duration="500ms">
                        <h2 style="margin-top: -2em;" class="text-blue strong">Servis</h2>
                        <h4 style="margin-bottom: 3em" class="text-blue strong">Berikut Ini Status Servis Yang Ada
                            Pada Bengkel</h4>
                    </div>
                    <div class="slide-container swiper">
                        <div class="slide-content">
                            <center>
                                <div class="col-lg-4 mb-4">
                                    <input type="text" id="searchInput" class="form-control"
                                        placeholder="Cari Plat Anda...." />
                                </div>
                            </center>
                            <div class="samp-wrapper swiper-wrapper">
                                @foreach ($servis as $d)
                                    <div class="swiper-slide"
                                        data-search="{{ $d->plat }} {{ $d->pelanggan }} {{ $d->status }}">
                                        <div href="" class="sli">
                                            <div class="image-content">
                                                <span class="overlay"></span>

                                                @if ($d->status == 'Confirm')
                                                    <div class="sli-image">
                                                        <img src="{!! asset('layout/img/wait.jpg') !!}" alt=""
                                                            class="card-img">
                                                    </div>
                                                @elseif ($d->status == 'Pending')
                                                    <div class="sli-image">
                                                        <img src="{!! asset('layout/img/wait.jpg') !!}" alt=""
                                                            class="card-img">
                                                    </div>
                                                @elseif ($d->status == 'Working')
                                                    <div class="sli-image">
                                                        <img src="{!! asset('layout/img/work.jpg') !!}" alt=""
                                                            class="card-img">
                                                    </div>
                                                @elseif ($d->status == 'Done')
                                                    <div class="sli-image">
                                                        <img src="{!! asset('layout/img/done.jpg') !!}" alt=""
                                                            class="card-img">
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="sli-content">
                                                <h2 class="name">{{ $d->pelanggan }}</h2>
                                                <p class="description">{{ $d->plat }}</p>
                                                @if ($d->status == 'Confirm')
                                                    <p class="description">Proses pengerjaan servis mobil masih
                                                        dalam
                                                        tahapan menunggu, dimohon untuk bersabar kepada pemilik
                                                        mobil
                                                    </p>
                                                @elseif ($d->status == 'Pending')
                                                    <p class="description">Proses pengerjaan servis mobil masih
                                                        dalam
                                                        tahapan menunggu, dimohon untuk bersabar kepada pemilik
                                                        mobil
                                                    </p>
                                                @elseif ($d->status == 'Working')
                                                    <p class="description">Proses pengerjaan servis mobil masih
                                                        dalam
                                                        tahapan pengerjaan, dimohon untuk bersabar kepada pemilik
                                                        mobil
                                                    </p>
                                                @elseif ($d->status == 'Done')
                                                    <p class="description">Proses pengerjaan servis mobil sudah
                                                        dalam
                                                        tahapan selesai, silahkan untuk melakukan proses pembayaran
                                                        </p>
                                                @endif
                                                @if ($d->status == 'Confirm')
                                                    <button class="btn btn-secondary">Menunggu</button>
                                                @elseif ($d->status == 'Pending')
                                                    <button class="btn btn-secondary">Menunggu</button>
                                                @elseif ($d->status == 'Working')
                                                    <button class="btn btn-danger">Dikerjakan</button>
                                                @elseif ($d->status == 'Done')
                                                    <button class="btn btn-success">Selesai</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div style="color: #000000" class="swiper-button-next swiper-navBtn"></div>
                        <div style="color: #000000" class="swiper-button-prev swiper-navBtn"></div>
                    </div>
                </div>
            </div>

        </section>



        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-md-11 py-8" id="superhero">

            <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block background-position-top"
                style="background-image:url('layout/img/superhero/oval.png');opacity:.5; background-position: top !important ;filter: grayscale(100%);
                -webkit-filter: grayscale(100%);
                -moz-filter: grayscale(100%);
                -ms-filter: grayscale(100%);
                -o-filter: grayscale(100%);">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h1 class="fw-bold mb-4 fs-7">Butuh Layanan Servis?</h1>
                        <p class="mb-5 text-info fw-medium">Apakah kendaraan anda mengalami kerusakan, butuh
                            perbaikan
                            yang berkualitas dan terjamin
                            ?<br /></p>
                        <a class="btn btn-pink btn-md" href="https://wa.me/6287860958904">Hubungi Kami</a>
                    </div>
                </div>
            </div><!-- end of .container-->


        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->

        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pb-2 pb-lg-5" style="background: #7FA998">

            <div class="container">
                <div class="row border-top border-top-secondary pt-7">
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1"><img
                            class="mb-4" src="{!! asset('assets/img/logo.png') !!}" width="184" alt="" /></div>
                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 order-3 order-md-3 order-lg-2">
                        <h2 class="text">Hubungi Kami</h2><br>
                        <div class="place">
                            <a href="https://maps.app.goo.gl/WxS7zCTBifxWxMe39"
                                class="fas fa fa-map-marker text-white"></a>
                            <a href="https://maps.app.goo.gl/WxS7zCTBifxWxMe39" class="texttt text-blue"
                                style="text-decoration: none;position: absolute;">Jl. Gandapura III F No.1, Kesiman
                                <br> Kertalangu, Kec.
                                Denpasar Timur, <br> Kota Denpasar, Bali 80237</a><br>
                        </div><br>
                        <div class="phone mt-4">
                            <a href="tel:087860958904" class="fas fa fa-phone text-white"></a>
                            <a href="tel:087860958904" class="text11 text-blue"
                                style="text-decoration: none">+(0361)-467279</a>
                        </div>
                        <div class="email mt-1">
                            <a href="mailto:madeaguskresna22@gmail.com" class="fas fa fa-envelope text-white"></a>
                            <a href="mailto:madeaguskresna22@gmail.com" class="texttt mt-3 text-blue"
                                style="text-decoration: none">info@bengkel-wahyu.com</a>
                        </div>
                        <div class="email mt-1">
                            <a href="" class="fas fa fa-clock text-white"></a>
                            <a href="" class="texttt mt-3 text-blue"
                                style="text-decoration: none">08.00 - 16.00</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 mb-4 mb-lg-0 order-2 order-md-2 order-lg-4">
                        <p class="fs-2 mb-lg-4">
                            Layanan Kami</p>
                        <a class="btn btn-pink fw-medium py-1" href="https://wa.me/6287860958904">Info</a>
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="text-center py-0" style="background: #305F72">

            <div class="container">
                <div class="container border-top py-3">
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-auto mb-1 mb-md-0">
                            <p class="mb-0">&copy; 2023 Bengkel Wahyu Pratama UD </p>
                        </div>
                        <div class="col-12 col-md-auto">
                            <p class="mb-0">
                                Made with<span class="fas fa-heart mx-1 text-danger"> </span> <a
                                    class="text-decoration-none ms-1" href="https://themewagon.com/"
                                    target="_blank"></a></p>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <iframe class="rounded" style="width:100%;height:500px;"
                    src="https://www.youtube.com/embed/_lhdhL4UDIo" title="YouTube video player"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{!! asset('vendors/@popperjs/popper.min.js') !!}"></script>
    <script src="{!! asset('vendors/bootstrap/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('vendors/is/is.min.js') !!}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{!! asset('vendors/fontawesome/all.min.js') !!}"></script>
    <script src="{!! asset('layout/js/theme.js') !!}"></script>
    <script src="{!! asset('layout/js/swiper-bundle.min.js') !!}"></script>
    <script src="{!! asset('layout/js/script.js') !!}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to handle the search
            function performSearch() {
                var searchQuery = $('#searchInput').val().toLowerCase();
                $('.swiper-slide').each(function() {
                    var slideData = $(this).data('search').toLowerCase();
                    if (slideData.includes(searchQuery)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Trigger the search when the user types in the input field
            $('#searchInput').on('input', performSearch);
        });
    </script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap"
        rel="stylesheet">
</body>

</html>
