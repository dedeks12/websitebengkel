<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPegawai implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // for selecting specific fields
        return Pegawai::select('nama_pegawai', 'gaji', 'alamat', 'no_ktp')->get();
        // for selecting all fields
        // return ProductList::all();
    }

    public function headings(): array
        {
            //Put Here Header Name That you want in your excel sheet 
            return [
                'Nama Pegawai',
                'Gaji',
                'Alamat',
                'No Ktp'
            ];
        }
}
