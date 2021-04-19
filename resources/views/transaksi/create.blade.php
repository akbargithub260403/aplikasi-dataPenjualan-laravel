@extends('templates.master')
@section('judul','Halaman Transaksi')

@section('content')
<div class="content">

@if (session('success'))
  <div class="alert alert-success my-3">
    {{ session('success') }}
  </div>
@endif
@if (session('failed'))
  <div class="alert alert-danger my-3">
    {{ session('failed') }}
  </div>
@endif

<form action="{{'/transaksi/postdata'}}" method="POST">
@csrf
<input type="hidden" name="nama_brg" readonly value="{{$nama_brg}}">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Kode Transaksi</label>
                        <input type="text" class="form-control @error('kd_transaksi') is-invalid @enderror" readonly name="kd_transaksi" value="{{$kd_transaksi}}">
                        @error('kd_transaksi')
                                <div class="alert alert-warning invalid-feedback">
                                    <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror
                      </div>
                    </div>
                   </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Kode Supplier</label>
                        <input type="text" class="form-control  @error('kd_supplier') is-invalid @enderror" placeholder="Kode Supplier" name="kd_supplier" autocomplete="off">
                        @error('kd_supplier')
                                <div class="alert alert-danger invalid-feedback">
                                  <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Jumlah Barang yang Diinginkan</label>
                        <input type="number" class="form-control @error('jumlah_brg') is-invalid @enderror" placeholder="Jumlah Barang" autocomplete="off" name="jumlah_brg">
                        @error('jumlah_brg')
                                <div class="alert alert-danger invalid-feedback">
                                  <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Jumlah Barang yang Tersedia</label>
                        <input type="number" class="form-control @error('jumlah_brg') is-invalid @enderror" readonly placeholder="{{$barang_tersedia}}">
                      </div>
                    </div>
                    </div>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="" autocomplete="off" cols="30" rows="10"></textarea>
                        @error('keterangan')
                                <div class="alert alert-danger invalid-feedback">
                                  <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror
                      </div>
                    </div>
                    </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Tambah Data</button>
                    </div>
                  </div>
                </form>

</div>
@endsection