<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';

    protected $fillable = ['kd_supplier','nama_supplier','email_supplier','no_telp','alamat','avatar'];

    public function getAvatar()
    {
        if ($this->avatar == '') {
            return asset('images/laravel.png');
        }

        return asset('images/'.$this->avatar);
    }
}
