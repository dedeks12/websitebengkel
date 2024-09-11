@extends('app')
@section('content')

    <head>
        <!-- Pengaturan lainnya -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    </head>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Servis /</span> Data Servis</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Tabel Servis</h5>
            <div class="table-responsive text-nowrap">
                <a href="{{ route('servis.create') }}" class="btn rounded-pill btn-primary mb-3"><i
                        class="bx bx-plus me-1"></i>Servis</a>

                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Nama Jasa</th>
                            <th>Harga Jasa</th>
                            <th>Tanggal</th>
                            <th>Plat</th>
                            <th>Telepon</th>
                            <th>Status</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($servis as $result => $d)
                            <tr>
                                <td>{{ $d->pelanggan }}</td>
                                <td>
                                    @foreach ($d->jasa as $tag)
                                        {{ $tag->nama_jasa_servis }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($d->jasa as $tag)
                                        {{ $tag->harga_jasa_servis }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $d->tanggal }}</td>
                                <td>{{ $d->plat }}</td>
                                <td>{{ $d->telepon }}</td>
                                <td>
                                    @if ($d->status == 'Confirm')
                                        <button class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#basicModal{{ $d->id }}">{{ $d->status }}</button>
                                    @elseif ($d->status == 'Pending')
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#basicModal{{ $d->id }}">{{ $d->status }}</button>
                                    @elseif ($d->status == 'Working')
                                        <button class="btn btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#basicModal{{ $d->id }}">{{ $d->status }}</button>
                                    @elseif ($d->status == 'Done')
                                        <button class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#basicModal{{ $d->id }}">{{ $d->status }}</button>
                                    @elseif ($d->status == 'Taken')
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#basicModal{{ $d->id }}">{{ $d->status }}</button>
                                    @endif

                                    <!-- Modal -->
                                    <div class="modal fade" id="basicModal{{ $d->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Update Status</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!--FORM UPDATE BARANG-->
                                                    <form action="{{ route('servis.status', $d->id) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <label for="">Status</label>
                                                                <select name="updateStatus" class="form-control">
                                                                    <?php old('status', $d->status); ?>
                                                                    <option {{ $d->status == 'Confirm' ? 'selected' : '' }}
                                                                        value="Confirm">Confirm</option>
                                                                    <option {{ $d->status == 'Pending' ? 'selected' : '' }}
                                                                        value="Pending">Pending</option>
                                                                    <option
                                                                        {{ $d->status == 'Working' ? 'selected' : '' }}
                                                                        value="Working">Working
                                                                    </option>
                                                                    <option
                                                                        {{ $d->status == 'Done' ? 'selected' : '' }}
                                                                        value="Done">Done
                                                                    </option>
                                                                    <option
                                                                        {{ $d->status == 'Taken' ? 'selected' : '' }}
                                                                        value="Taken">Taken
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal UPDATE Barang-->
                                </td>
                                <td>
                                    <form action="{{ route('servis.destroy', $d->id) }}" method="POST">
                                        <a href="{{ route('servis.edit', $d->id) }}" class="btn btn-sm btn-primary"><i
                                                class="bx bx-edit me-1"></i>EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger show-alert-delete-box"><i
                                                class="bx bx-trash me-1"></i>HAPUS</button>
                                        <a class="btn btn-sm btn-success" href="{{ route('servis.formwa', $d->id) }}"><i
                                                class="bx bxl-whatsapp me-1"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Post belum Tersedia.
                            </div>
                        @endforelse
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
@endsection
