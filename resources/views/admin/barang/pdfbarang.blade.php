<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
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

    <h2>Data Barang</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach ($barang as $tag)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                        {{ $tag->nama_barang }}
                    </td>
                    <td>
                        {{ $tag->harga_barang }}<br>
                    </td>
                    <td>{{ $tag->stok }}</td>
                    
            @endforeach
        </tbody>
    </table>
    <h2>Kesimpulan Pada Tabel</h2>
    <h3>Barang dengan Stok Terbanyak Adalah {{ $banyak_barang->nama_barang }} dengan jumlah {{ $banyak_barang->stok }}
    </h3>
    <h3>Barang dengan Stok Paling Sedikit Adalah {{ $dikit_barang->nama_barang }} dengan jumlah
        {{ $dikit_barang->stok }}</h3>

</html>
