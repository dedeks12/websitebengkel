<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Data Bukti Transfer</h2>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Telepon</th>
            <th>Plat</th>
            <th>Bukti Transfer</th>
        </tr>
    </thead>
    <tbody>
        @php $no=1; @endphp
        @foreach ($upload as $post)
            <tr>
                <td>{{ $no++ }}</td>
                <td>
                    <strong>{{ $post->nama }}</strong>
                </td>
                
                <td>
                    <strong>{{ $post->telepon }}</strong>
                </td>
                <td>
                    <strong>{{ $post->plat }}</strong>
                </td>
                <td style="width: 50px">
                    @if ($post->image)
                        <img src="{{ public_path('storage/upload/' . $post->image) }}"
                            alt="{{ $post->image }}"class="img-fluid mt-3" width="150px">
                    @endif
                </td>
                {{-- <td>
                    <img src="{{ Storage::url('public/upload/') . $post->image }}" class="rounded"
                        style="width: 150px">
                </td> --}}
            </tr>
            @endforeach
    </tbody>
</table>
<h2>Kesimpulan Pada Tabel</h2>
<h3>Total Bukti Transfer adalah {{$total_upload}}</h3>
</body>
</html>

