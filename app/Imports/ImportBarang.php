<?php

namespace App\Imports;

use App\Barang;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportBarang implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Barang([
            'kd_barang'     => $row[1],
            'nama_brg'      => $row[2],
            'jenis_brg'     => $row[3],
            'jumlah_brg'    => $row[4],
            'merk'          => $row[5],
            'keterangan'    => $row[6]
        ]);
    }
}
