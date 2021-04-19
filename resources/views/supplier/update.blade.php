@extends('templates.master')
@section('judul','Halaman Supplier')

@section('content')
<div class="content">

<form action="/supplier/{{$supplier->id}}/postupdate" method="POST" enctype="multipart/form-data">
@method('patch')
@csrf
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Kode Supplier</label>
                        <input type="text" class="form-control @error('kd_supplier') is-invalid @enderror" readonly name="kd_supplier" value="{{$supplier->kd_supplier}}">
                        @error('kd_supplier')
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
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control  @error('nama_supplier') is-invalid @enderror" placeholder="Nama" value="{{$supplier->nama_supplier}}" name="nama_supplier" autocomplete="off">
                        @error('nama_supplier')
                                <div class="alert alert-danger invalid-feedback">
                                  <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                    <div class="row"><div class="col-4">
                    <div class="form-group">
                                <label for="exampleFormControlSelect1">Email Supplier</label>
                                <input type="text" class="form-control @error('email_supplier') is-invalid @enderror" placeholder="Email" value="{{$supplier->email_supplier}}" name="email_supplier" autocomplete>
                                @error('email_supplier')
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
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" placeholder="Jumlah" value="{{$supplier->no_telp}}" name="no_telp">
                        @error('no_telp')
                                <div class="alert alert-danger invalid-feedback">
                                  <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="alamat Barang" value="{{$supplier->alamat}}" name="alamat">
                        @error('alamat')
                                <div class="alert alert-danger invalid-feedback">
                                  <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-5">
                        <label>Avatar</label>
                        <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                        @error('avatar')
                                <div class="alert alert-warning invalid-feedback">
                                    <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror    
                    </div>
                   </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Update Data</button>
                    </div>
                  </div>
                </form>

</div>
@endsection