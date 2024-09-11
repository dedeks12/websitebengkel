<!DOCTYPE html>
<html>
<head>
    <title>Nota Pembayaran</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
   
</style>
<body style="font-family: Arial, sans-serif;
line-height: 1.6;
margin: 0;
padding: 0;">
    <div style=" max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;">
 @if ($nota)
            <table>
                <td >
                    <span ><b>Bengkel Wahyu Pratama UD.</b></span></br>
                    Jl. Gandapura III F No.1, Kesiman Kertalangu, </br>Kec. Denpasar Tim., Kota Denpasar, Bali 80237 </br>
                    Telp : (0361) 467279
                </td>
                <td >
                    <b style="margin-top: -1em"><span >FAKTUR PENJUALAN</span></b></br>
                    No Trans. : {{ $nota->id }}</br>
                    Tanggal :{{ $nota->created_at }}</br>

                </td>
            </table>
            <table >
                <td >
                    Nama Pelanggan : {{ $nota->pelanggan }}</br>
                </td>
                <td style='vertical-align:top;margin-left: 2em' width='60%' align='right'>
                    No Telp : {{ $nota->telepon }}
                </td>
            </table>
            <table style="width: 100%;
            border-collapse: collapse;
            margin-top: 20px;">

                <thead>
                    <tr>
                        <th style="border: 1px solid #ccc;
                        padding: 8px;
                        text-align: left;">Nama Barang</th>
                        <th style="border: 1px solid #ccc;
                        padding: 8px;
                        text-align: left;">Harga Barang</th>
                        <th style="border: 1px solid #ccc;
                        padding: 8px;
                        text-align: left;">Jumlah</th>
                        <th style="border: 1px solid #ccc;
                        padding: 8px;
                        text-align: left;">Total Harga</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($nota->barang as $tag)
                        <tr>
                            <td style="border: 1px solid #ccc;
                            padding: 8px;
                            text-align: left;">
                                {{ $tag->nama_barang }}

                            </td>
                            <td style="border: 1px solid #ccc;
                            padding: 8px;
                            text-align: left;">Rp.{{ $tag->harga_barang }}</td>
                            <td style="border: 1px solid #ccc;
                            padding: 8px;
                            text-align: left;">{{ $tag->pivot->jumlah }}</td>
                            <td style='border: 1px solid #ccc;
                            padding: 8px;
                            text-align: left;'>Rp.{{ $tag->harga_barang * $tag->pivot->jumlah }}</td>
                        </tr>
                    @endforeach

                    
                {{-- <td>{{ $nota->status }}</td> --}}
                @foreach ($nota->servis->jasa as $row)
                <tr>
                                <td style="border: 1px solid #ccc;
                                padding: 8px;
                                text-align: left;">{{ $row->nama_jasa_servis }}</td>
                                <td style="border: 1px solid #ccc;
                                padding: 8px;
                                text-align: left;">Rp. {{ $row->harga_jasa_servis }}</td>
                                <td style="border: 1px solid #ccc;
                                padding: 8px;
                                text-align: left;">-</td>
                                <td style='border: 1px solid #ccc;
                                padding: 8px;
                                text-align: left;'>Rp. {{ $row->harga_jasa_servis }}</td>
                            </tr>
                        @endforeach
                        {{-- @foreach($nota->servis->jasas as $jasa)
                        <li>{{ $jasa->nama_jasa_servis }}</li>
                    @endforeach --}}
                @else
                    </tr>
                    <tr>
                        <td class="text-center text-muted" colspan="10">Data tidak tersedia </td>
                    </tr>
        @endif

        <tr>
            <td colspan='3' style="border: 1px solid #ccc;
            padding: 8px;
            text-align: left;">
                <div style='text-align:right'>Total Yang Harus Di Bayar Adalah : </div>
            </td>
            <td style='border: 1px solid #ccc;
            padding: 8px;
            text-align: left;'>Rp{{$total}}</td>
        </tr>
        </tbody>
        </table>
        <div class="nota-footer">
            <center>
            <table cellspacing='5' style="text-align: center; justify-content: center;">
                <tr>
                    <td align='center' style="text-align: left;margin-right: 2em;">Diterima Oleh,</br></br><u>(............)</u></td>
                    <td style='border:1px solid black; padding:5px; text-align:center; width:30%'>{{ $nota->status }}</td>
                    <td align='center'>TTD,</br></br><u>(...........)</u></td>
                </tr>
            </table>
        </center>

        </div>
    </div>
</body>
</html>
