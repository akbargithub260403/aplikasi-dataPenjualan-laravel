<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = ['kd_barang','nama_brg','jenis_brg','jumlah_brg','merk','keterangan','gambar'];

    public function getAvatar()
    {
        if ($this->gambar == '') {
            return asset('images/laravel.png');
        }

        return asset('images/gambar/'.$this->gambar);
    }
}
