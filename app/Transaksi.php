<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = ['kd_transaksi','kd_supplier','kd_barang','nama_supplier','nama_brg','jumlah_brg','keterangan'];

}
