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

<h2>Data Pegawai</h2>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>Gaji</th>
            <th>Alamat</th>
            <th>No KTP</th>

        </tr>
    </thead>
    <tbody>
        @php $no=1; @endphp
        @foreach ($pegawai as $post)
            <tr>
                <td>{{ $no++ }}</td>
                <td>
                    <strong>{{ $post->nama_pegawai }}</strong>
                </td>
                <td>
                    <strong>{{ $post->gaji }}</strong>
                </td>
                <td>
                    <strong>{{ $post->alamat }}</strong>
                </td>
                <td>
                    <strong>{{ $post->no_ktp }}</strong>
                </td>
                        </tr>
            @endforeach
    </tbody>
</table>

<h2>Kesimpulan Pada Tabel</h2>
<h3>Pegawai dengan Gaji Terbanyak Adalah {{ $banyak_pegawai->nama_pegawai }} dengan jumlah {{ $banyak_pegawai->gaji }}</h3>
<h3>Pegawai dengan Gaji Paling Sedikit Adalah {{ $dikit_pegawai->nama_pegawai }} dengan jumlah {{ $dikit_pegawai->gaji }}</h3>
<h3>Total Pegawai adalah {{$total_pegawai}}</h3>

</body>
</html>

