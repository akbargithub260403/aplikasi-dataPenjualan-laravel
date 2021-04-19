@extends('templates.master')
@section('judul','Halaman Transaksi')

@section('content')
<div class="row">
          <div class="col-md-12">
@if (session('status'))
  <div class="alert alert-success my-3">
    {{ session('status') }}
  </div>
@endif
          
                
              <div class="card-header">
                <h4 class="card-title d-inline"> Table Data Transaksi</h4>
                <div class="btn-group float-right mb-3">
                    <div class="btn-group dropleft" role="group">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Action Button</span>
                        </button>
                        <div class="dropdown-menu">
                        
                        <a href="/export/{{'transaksi'}}" class="btn btn-outline-warning btn-sm">
                            Export Data Supplier
                        </a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-info btn-sm">
                    Action Button
                    </button>
              </div>
              <form action="/search/transaksi" method="post" class="my-4">
                      @csrf
                        <input type="text" name="keyword" class="form-control col-8 d-inline" autocomplete="off" placeholder="Search Engine">
                        <button type="submit" class="btn btn-info btn-sm">Search</button>
                      </form>
              
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Kode Transaksi
                      </th>
                      <th>
                        Kode Barang
                      </th>
                      <th>
                        Nama Supplier
                      </th>
                      <th class="text-right">
                        
                      </th>
                      <th></th>
                    </thead>
                    <tbody>
                    @foreach($transaksi as $tr)
                      <tr>
                        <td>{{$tr->kd_transaksi}}</td>
                        <td>{{$tr->kd_barang}}</td>
                        <td>{{$tr->nama_supplier}}</td>
                        <td>
                        <a href="/show/transaksi/{{$tr->id}}"class="badge badge-success">Info</a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          </div>
@endsection