@extends('templates.master')
@section('judul','Halaman Barang')

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
                <p class="description text-center">
                    <img src="{{ $barang->getAvatar()}}" alt="" height="200px;" widht="200px;">
                </p>
              </div>
              <div class="card-footer">
                <hr>
               
              </div>
            </div>
            </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Detail Barang</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$barang->kd_barang}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$barang->nama_brg}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Merk Barang</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$barang->merk}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" disabled="" placeholder="{{$barang->keterangan}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Jumlah Barang</label>
                        <input type="number" class="form-control" disabled="" placeholder="{{$barang->jumlah_brg}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <a href="/barang/{{$barang->id}}/update" class="btn btn-outline-success btn-round">Update Barang</a>
                      <form action="/barang/{{$barang->id}}/hapus" class="d-inline" method="post">
                      @method('delete')
                      @csrf
                      <button class="btn btn-outline-danger btn-round">Hapus</button>
                      </form>
                      @if ($barang->jumlah_brg > '0')
                      <a href="/transaksi/add/{{$barang->id}}" class="btn btn-outline-info">Transaksi</a>
                      @endif
                    </div>
                  </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection