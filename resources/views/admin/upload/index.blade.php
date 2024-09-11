@extends('app')
@section('content')
<head>
    <!-- Pengaturan lainnya -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bukti Transfer /</span> Data Bukti Transfer</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Tabel Bukti Transfer</h5>
            <div class="table-responsive text-nowrap">
                <a href="{{ route('upload.create') }}" class="btn rounded-pill btn-primary mb-3"><i
                        class="bx bx-plus me-1"></i>Bukti Transfer</a>
                <a href="{{ route('transfer.export-pdf') }}" class="btn rounded-pill btn-danger mb-3"><i
                        class="bx bxs-file-pdf me-1"></i>PDF</a>
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Telepon</th>
                            <th>Tanggal</th>
                            <th>Plat</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($upload as $post)
                            <tr>
                                <td>
                                    {{ $post->nama }}
                                </td>
                                <td>
                                    <img src="{{ Storage::url('public/upload/') . $post->image }}" class="rounded"
                                        style="width: 150px">
                                </td>
                                <td>
                                    {{ $post->telepon }}
                                </td>
                                <td>
                                    {{ $post->tanggal }}
                                </td>
                                <td>
                                    {{ $post->plat }}
                                </td>
                                <td>
                                    {{ $post->alamat }}
                                </td>
                                <td>
                                    @if ($post->status == 'Success')
                                        <button class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#basicModal{{ $post->id }}">{{ $post->status }}</button>
                                    @elseif ($post->status == 'Pending')
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#basicModal{{ $post->id }}">{{ $post->status }}</button>
                                    @endif

                                    <!-- Modal -->
                                    <div class="modal fade" id="basicModal{{ $post->id }}" tabindex="-1"
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
                                                    <form action="{{ route('upload.status', $post->id) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <label for="">Status</label>
                                                                <select name="updateStatus" class="form-control">
                                                                    <?php old('status', $post->status); ?>
                                                                    <option
                                                                        {{ $post->status == 'Success' ? 'selected' : '' }}
                                                                        value="Success">Success</option>
                                                                    <option
                                                                        {{ $post->status == 'Pending' ? 'selected' : '' }}
                                                                        value="Pending">Pending</option>
                                                                </select>
                                                                <label for="">Foto Bukti Transfer</label>
                                                                <center>
                                                                <img src="{{ Storage::url('public/upload/') . $post->image }}"
                                                                    class="rounded aligns-item-center" style="width: 350px;height: 200px;">
                                                                </center>
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
                                    <form action="{{ route('upload.destroy', $post->id) }}" method="POST">
                                        <a href="{{ route('upload.edit', $post->id) }}" class="btn btn-sm btn-primary"><i
                                                class="bx bx-edit me-1"></i>EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger show-alert-delete-box"><i
                                                class="bx bx-trash me-1"></i>HAPUS</button>
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
    <!--/ Basic Bootstrap Table -->
@endsection
