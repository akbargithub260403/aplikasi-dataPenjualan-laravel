@extends('templates.master')
@section('judul','Halaman Barang')

@section('content')
<div class="content">

<form action="/barang/{{$barang->id}}/postupdate" method="POST" enctype="multipart/form-data">
@method('patch')
@csrf
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control @error('kd_barang') is-invalid @enderror" readonly name="kd_barang" value="{{$barang->kd_barang}}">
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
                        <input type="text" class="form-control  @error('nama_brg') is-invalid @enderror" placeholder="Nama" value="{{$barang->nama_brg}}" name="nama_brg" autocomplete="off">
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
                                <select class="form-control @error('jenis_brg') is-invalid @enderror" style="height:40px;" id="exampleFormControlSelect1" value="{{$barang->jenis_brg}}" name="jenis_brg">
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
                        <input type="number" class="form-control @error('jumlah_brg') is-invalid @enderror" placeholder="Jumlah" value="{{$barang->jumlah_brg}}" name="jumlah_brg">
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
                        <input type="text" class="form-control @error('merk') is-invalid @enderror" placeholder="Merk Barang" value="{{$barang->merk}}" name="merk">
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
                        <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" value="{{$barang->keterangan}}">
                        @error('keterangan')
                                <div class="alert alert-danger invalid-feedback">
                                  <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror
                      </div>
                    </div>
                    </div>
                  <div class="row">
                    <div class="col-md-8">
                        <label>Gambar</label>
                        <input name="gambar" type="file" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar')
                                <div class="alert alert-danger invalid-feedback">
                                  <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror
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