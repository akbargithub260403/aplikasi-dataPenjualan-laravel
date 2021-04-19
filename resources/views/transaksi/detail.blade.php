@extends('templates.master')
@section('judul','Halaman Transaksi')

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
                    <img class="avatar border-gray"  alt="...">
                    <h5 class="title">{{$transaksi->nama_supplier}}</h5>
                  <p class="description">
                    <a href="/create/barcode/{{$transaksi->id}}" class="btn btn-outline-warning">QrCode</a>
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
                <h5 class="card-title">Detail Transaksi</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Kode Transaksi</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$transaksi->kd_transaksi}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Kode Supplier</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$transaksi->kd_supplier}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$transaksi->nama_supplier}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$transaksi->kd_barang}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$transaksi->nama_brg}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Jumlah Barang</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$transaksi->jumlah_brg}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Keterangan Transaksi</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$transaksi->keterangan}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <form action="/transaksi/{{$transaksi->id}}/hapus" class="d-inline" method="post">
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