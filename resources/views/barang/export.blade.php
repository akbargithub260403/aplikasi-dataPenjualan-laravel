<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Barang.xls");
?>
<h2>Data Barang</h2>
<table border="1">
    <thead>
        <th>#</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Merk Barang</th>
        <th>Jenis Barang</th>
        <th>Jumlah Barang</th>
        <th>Keterangan</th>
    </thead>
    <tbody>
        @foreach($data as $dt)
        <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td>{{$dt->kd_barang}}</td>
            <td>{{$dt->nama_brg}}</td>
            <td>{{$dt->merk}}</td>
            <td>{{$dt->jenis_brg}}</td>
            <td>{{$dt->jumlah_brg}}</td>
            <td>{{$dt->keterangan}}</td>
        </tr>
        @endforeach
    </tbody>
</table>