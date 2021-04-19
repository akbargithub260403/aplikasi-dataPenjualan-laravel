@extends('templates.master')
@section('judul','Halaman Supplier')

@section('content')
<div class="content">

@if (session('status'))
  <div class="alert alert-success my-3">
    {{ session('status') }}
  </div>
@endif

<form action="{{'/supplier/postdata'}}" method="POST">
@csrf
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Kode Supplier</label>
                        <input type="text" class="form-control @error('kd_supplier') is-invalid @enderror" readonly name="kd_supplier" value="{{$kd_supplier}}">
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
                        <input type="text" class="form-control  @error('nama_supplier') is-invalid @enderror" placeholder="Nama" name="nama_supplier" autocomplete="off">
                        @error('nama_supplier')
                                <div class="alert alert-danger invalid-feedback">
                                  <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                    <div class="row"><div class="col-md-6 pr-1">
                    <div class="form-group">
                                <label for="exampleFormControlSelect1">Email Supplier</label>
                                <input type="email" class="form-control  @error('email_supplier') is-invalid @enderror" placeholder="Email" name="email_supplier" autocomplete="off">
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
                        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" placeholder="No Telepon" autocomplete="off" name="no_telp">
                        @error('no_telp')
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
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="" autocomplete="off" cols="30" rows="10"></textarea>
                        @error('alamat')
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