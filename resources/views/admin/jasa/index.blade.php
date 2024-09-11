@extends('app')
@section('content')
<head>
    <!-- Pengaturan lainnya -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Jasa /</span> Data Jasa</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Tabel Jasa</h5>
            <div class="table-responsive text-nowrap">
                <a href="{{ route('jasa.create') }}" class="btn rounded-pill btn-primary mb-3"><i class="bx bx-plus me-1"></i>Jasa</a>

                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Nama jasa</th>
                            <th>Harga jasa</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jasa as $post)
                            <tr>
                                <td>{{ $post->nama_jasa_servis }}</td>
                                <td>{!! $post->harga_jasa_servis !!}</td>
                                <td>
                                    <form
                              action="{{ route('jasa.destroy', $post->id) }}"
                              method="POST">
                              <a href="{{ route('jasa.edit', $post->id) }}"
                                  class="btn btn-sm btn-primary"><i class="bx bx-edit me-1"></i>EDIT</a>
                              @csrf
                              @method('DELETE')
                              <button type="submit"
                                  class="btn btn-sm btn-danger show-alert-delete-box"><i class="bx bx-trash me-1"></i>HAPUS</button>
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
