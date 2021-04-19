<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'hilman',
            'email' => 'hilman@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('barang')->insert([
            'kd_barang'     => '12738192',
            'nama_brg'      => 'Laptop Acer',
            'jenis_brg'     => 'ELEKTRONIK',
            'jumlah_brg'    => '10',
            'merk'          => 'ACER',
            'keterangan'    => 'barang new',
            'gambar'        => 'NULL'
        ]);

        DB::table('supplier')->insert([
            'kd_supplier'   => '00129812',
            'nama_supplier' => 'Firman Tresna',
            'email_supplier'=> 'firman@gmail.com',
            'alamat'        => 'bandung',
            'no_telp'       => '08982918291',
            'avatar'        => '1600048400_img-1.jpg'
        ]);

        DB::table('transaksi')->insert([
            'kd_transaksi'  => '09291820',
            'kd_supplier'   => '00129812',
            'kd_barang'     => '12738192',
            'nama_supplier' => 'Firman Tresna',
            'nama_brg'      => 'Laptop Acer',
            'jumlah_brg'    => '5',
            'keterangan'    => 'barang akan dikirim' 
        ]);
        // $this->call(UserSeeder::class);
    }
}
