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

    <h2>Data Nota</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Barang</th>
                <th>Nama Pegawai</th>
                <th>Nama Jasa Servis</th>
                <th>Harga Jasa Servis</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($nota as $result => $d)
                @php
                    $totalbarang = 0;
                    $totalJasa = 0;
                @endphp
                <tr>
                    @foreach ($d->barang as $barangs)
                        @php
                            $harga = $barangs->harga_barang;
                            $jumlah = $barangs->pivot->jumlah;
                            
                            if ($jumlah > 1) {
                                $subtotal = $harga * $jumlah;
                                $totalbarang += $subtotal;
                            } else {
                                $subtotal = $harga * $jumlah;
                                $totalbarang += $subtotal;
                            }
                        @endphp
                    @endforeach
                    @foreach ($d->servis->jasa as $jasas)
                        @php
                            $hargaJasa = $jasas->harga_jasa_servis;
                            $totalJasa += $hargaJasa;
                        @endphp
                    @endforeach


                    @php
                        $total = $totalbarang + $totalJasa;
                        
                    @endphp


                    <td>
                        {{ $d->servis->pelanggan }}
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
                    <td>
                        @foreach ($d->servis->jasa as $tag)
                            {{ $tag->nama_jasa_servis }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($d->servis->jasa as $item)
                            {{$item->harga_jasa_servis}}
                        @endforeach
                    </td>
                    <td>{{ $total }}</td>
                    {{-- <td style='text-align:right'>Rp{{ $d->total }}</td> --}}

                    {{-- <td>
                    @foreach ($d->servis->jasa as $tag)
                    {{ $tag->nama_jasa_servis }}<br>
                @endforeach                                
            </td> --}}

                </tr>
            @endforeach
            {{-- @foreach ($data as $item)
                <tr>
                    <td>{{ $item['Nama Barang'] }}</td>
                    <td>{{ $item['Harga Barang'] }}</td>
                    <td>{{ $item['Jumlah Barang'] }}</td>
                    <td>{{ $item['Nama Jasa'] }}</td>
                    <td>{{ $item['Harga Jasa'] }}</td>
                    <td>{{ $item['Total Harga'] }}</td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
    <h2>Kesimpulan Pada Tabel</h2>
    <h3>Total data Nota adalah {{ $total_nota }}</h3>

</html>
