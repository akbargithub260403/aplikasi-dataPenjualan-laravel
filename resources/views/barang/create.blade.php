@extends('templates.master')
@section('judul','Halaman Barang')

@section('content')
<div class="content">

@if (session('status'))
  <div class="alert alert-success my-3">
    {{ session('status') }}
  </div>
@endif

<form action="{{'/barang/postdata'}}" method="POST">
@csrf
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control @error('kd_barang') is-invalid @enderror" readonly name="kd_barang" value="{{$kd_barang}}">
                        @error('kd_barang')
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
                        <label>Nama Barang</label>
                        <input type="text" class="form-control  @error('nama_brg') is-invalid @enderror" placeholder="Nama" name="nama_brg" autocomplete="off">
                        @error('nama_brg')
                                <div class="alert alert-danger invalid-feedback">
                                  <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                    <div class="row"><div class="col-4">
                    <div class="form-group">
                                <label for="exampleFormControlSelect1">Jenis Barang</label>
                                <select class="form-control @error('jenis_brg') is-invalid @enderror" style="height:40px;" id="exampleFormControlSelect1" name="jenis_brg">
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Non_Elektronik">Non Elektronik</option>
                                </select>
                                @error('jenis_brg')
                                <div class="alert alert-danger invalid-feedback">
                                  <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Jumlah Barang</label>
                        <input type="number" class="form-control @error('jumlah_brg') is-invalid @enderror" placeholder="Jumlah" name="jumlah_brg">
                        @error('jumlah_brg')
                                <div class="alert alert-danger invalid-feedback">
                                  <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Merk</label>
                        <input type="text" class="form-control @error('merk') is-invalid @enderror" placeholder="Merk Barang" name="merk">
                        @error('merk')
                                <div class="alert alert-danger invalid-feedback">
                                  <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror
                      </div>
                    </div>
                    </div>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="" cols="30" rows="10"></textarea>
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