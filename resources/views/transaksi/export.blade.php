<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Transaksi.xls");
?>
<table border="1">
    <thead>
    <th>#</th>
        <th>Kode Transaksi</th>
        <th>Kode Supplier</th>
        <th>Kode Barang</th>
        <th>Nama Supplier</th>
        <th>Nama Barang</th>
        <th>Jumlah Barang</th>
        <th>Keterangan</th>
        <th>Masuk Pada Tanggal</th>
    </thead>
    <tbody>
    @foreach($data as $dt)
        <tr>
        <td>{{$loop->iteration}}</td>
            <td>{{$dt->kd_transaksi}}</td>
            <td>{{$dt->kd_supplier}}</td>
            <td>{{$dt->kd_barang}}</td>
            <td>{{$dt->nama_supplier}}</td>
            <td>{{$dt->nama_barang}}</td>
            <td>{{$dt->keterangan}}</td>
            <td>{{$dt->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>