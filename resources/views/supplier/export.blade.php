<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Supplier.xls");
?>
<table border="1">
    <thead>
    <th>#</th>
        <th>Kode Supplier</th>
        <th>Nama Supplier</th>
        <th>Email Supplier</th>
        <th>Nomor Telepon</th>
        <th>Alamat</th>
        <th>Terdaftar Pada Tanggal</th>
    </thead>
    <tbody>
    @foreach($data as $dt)
        <tr>
        <td>{{$loop->iteration}}</td>
            <td>{{$dt->kd_supplier}}</td>
            <td>{{$dt->nama_supplier}}</td>
            <td>{{$dt->email_supplier}}</td>
            <td>{{$dt->no_telp}}</td>
            <td>{{$dt->alamat}}</td>
            <td>{{$dt->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>