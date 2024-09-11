<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Barang;
use App\Models\Nota;

class ExportNota implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'Pelanggan',
            'Status',
            'Tanggal',
            'Total Harga',
        ];
    }

    // public function collection()
    // {
    //     // Ambil data barang yang memiliki relasi many-to-many dengan tabel nota
    //     return Nota::has('nota')->get();
    // }

    // public function headings(): array
    // {
    //     // Kolom-kolom yang akan ditampilkan di file Excel
    //     return [
    //         'ID',
    //         'Nama Barang',
    //         'Harga',
    //         // Tambahkan kolom lainnya sesuai kebutuhan
    //     ];
    // }


}
