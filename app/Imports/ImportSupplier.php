<?php

namespace App\Imports;

use App\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSupplier implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Supplier([
            'kd_supplier'       => $row[1],
            'nama_supplier'     => $row[2],
            'email_supplier'    => $row[3],
            'alamat'            => $row[4],
            'no_telp'           => $row[5]
        ]);
    }
}
