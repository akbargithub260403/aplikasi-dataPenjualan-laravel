@extends('templates.master')
@section('judul','Halaman Supplier')

@section('content')
 <!-- End Navbar -->
 <div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="{{ asset('img/damir-bosnjak.jpg')}}" alt="...">
              </div>
              <div class="card-body">
              <div class="author">
                    <img class="avatar border-gray" src="{{$supplier->getAvatar()}}" alt="...">
                    <h5 class="title">{{$supplier->nama_supplier}}</h5>
                  <p class="description">
                    {{$supplier->email_supplier}}
                  </p>
                </div>
              </div>
              <div class="card-footer">
                <hr>
              </div>
            </div>
            </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Detail Supplier</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Kode Supplier</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$supplier->kd_supplier}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$supplier->nama_supplier}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Email Supplier</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$supplier->email_supplier}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$supplier->alamat}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$supplier->no_telp}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <a href="/supplier/{{$supplier->id}}/update" class="btn btn-outline-success btn-round">Update Barang</a>
                      <form action="/supplier/{{$supplier->id}}/hapus" class="d-inline" method="post">
                      @method('delete')
                      @csrf
                      <button class="btn btn-outline-danger btn-round">Hapus</button>
                      </form>
                    </div>
                  </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection