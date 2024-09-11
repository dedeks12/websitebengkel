@extends('app')
@section('content')

    <head>
        <!-- Pengaturan lainnya -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    </head>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Data Nota</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card mb-2">
            <div class="card-header">
                <div class="col-md-12" style="margin-top: 0.2em">
                    <form action="{{ route('export.pdftgl') }}" method="GET">
                        <h6>Export Data Per Tanggal</h6>
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="start_date">Start Date:</label>
                                <input type="date" class="form-control" name="start_date" id="start_date">
                            </div>
                            <div class="col-md-4">
                                <label for="end_date">End Date:</label>
                                <input type="date" class="form-control" name="end_date" id="end_date">
                            </div>
                            <div class="col-md-4 mt-4">
                                <button type="submit" class="btn rounded-pill btn-danger"><i
                                        class="bx bxs-file-pdf me-1"></i>Export to PDF</button>
                            </div>
                        </div>
                    </form>

                    <form action="{{ route('export.exceltgl') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="start_date">Start Date:</label>
                                <input type="date" class="form-control" name="start_date">
                            </div>
                            <div class="col-md-4">
                                <label for="end_date">End Date:</label>
                                <input type="date" class="form-control" name="end_date">
                            </div>
                            <div class="col-md-4 mt-4">
                                <button type="submit" class="btn rounded-pill btn-success"><i
                                        class="bx bxs-spreadsheet me-1"></i>Export to Excel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Tabel Nota</h5>
            <div class="table-responsive text-nowrap ml-5">
                <a href="{{ route('nota.create') }}" class="btn rounded-pill btn-primary mb-4"><i
                        class="bx bx-plus me-1"></i>Nota</a>
                {{-- <a href="{{ route('nota.export-pdf') }}" class="btn rounded-pill btn-danger mb-4"><i
                        class="bx bxs-file-pdf me-1"></i>PDF</a>
                <a href="{{ route('nota.export-excel') }}" class="btn rounded-pill btn-success mb-4"><i
                        class="bx bxs-spreadsheet me-1"></i>Excel</a> --}}
                <table class="table mt-3" id="myTable">
                    <thead>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga Barang</th>
                            <th>Nama Pegawai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($nota as $result => $d)
                            <tr>
                                <td>
                                    {{ $d->pelanggan}}

                                </td>
                                <td>
                                    @foreach ($d->barang as $tag)
                                        {{ $tag->nama_barang }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($d->barang as $tag)
                                        {{ $tag->pivot->jumlah }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($d->barang as $tag)
                                        {{ $tag->harga_barang }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($d->pegawai as $tag)
                                        {{ $tag->nama_pegawai }}<br>
                                    @endforeach
                                </td>

                                {{-- <td>
                                    @foreach ($d->servis->jasa as $tag)
                                    {{ $tag->nama_jasa_servis }}<br>
                                @endforeach                                
                            </td> --}}

                                <td>
                                    @if ($d->status == 'Lunas')
                                        <a class="btn btn-success"
                                            href="{{ route('nota.pembayaran', $d->id) }}">{{ $d->status }}</a>
                                    @elseif ($d->status == 'Belum_Lunas')
                                        <a class="btn btn-warning"
                                            href="{{ route('nota.pembayaran', $d->id) }}">{{ $d->status }}</a>
                                    @endif
                                    <!-- Toggle Between Modals -->
                                </td>
                                <td>
                                    <form action="{{ route('nota.destroy', $d->id) }}" method="POST">
                                        <a href="{{ route('nota.edit', $d->id) }}" class="btn btn-sm btn-primary"><i
                                                class="bx bx-edit me-1"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger show-alert-delete-box"><i
                                                class="bx bx-trash me-1"></i></button>
                                        <a class="btn btn-sm btn-warning" href="{{ route('nota.print.pdf', $d->id) }}"><i
                                                class="bx bx-download me-1"></i>
                                        </a>
                                        <a class="btn btn-sm btn-success" href="{{ route('nota.wa', $d->id) }}"><i
                                                class="bx bxl-whatsapp me-1"></i>
                                        </a>
                                        <a class="btn btn-sm btn-dark" href="{{ route('nota.pdf', $d->id) }}"><i
                                                class="bx bxs-show me-1"></i></a>

                                    </form>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <script>
                        $(document).ready(function() {
                            $('#myTable').DataTable();
                            // Setel gaya CSS tabel untuk menghilangkan garis
                            // // Mengatur CSS untuk menipiskan garis pada tabel
                            // $('#myTable').css('border-collapse', 'collapse');
                            $('#myTable').css('border-spacing', '0');
                            $('#myTable th, #myTable td').css('border-bottom', '1px solid #ddd');
                        });
                    </script>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
    <!--/ Basic Bootstrap Table -->
@endsection
