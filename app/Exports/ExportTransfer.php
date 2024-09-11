<?php

namespace App\Exports;

use App\Models\Upload;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportTransfer implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // for selecting specific fields
        return Upload::select('nama', 'plat', 'telepon')->get();
        // for selecting all fields
        // return ProductList::all();
    }

    public function headings(): array
        {
            //Put Here Header Name That you want in your excel sheet 
            return [
                'Nama Pelanggan',
                'Plat',
                'Telepon'
            ];
        }
}

