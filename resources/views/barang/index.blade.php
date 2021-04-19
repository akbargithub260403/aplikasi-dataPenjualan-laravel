@extends('templates.master')
@section('judul','Halaman Barang')

@section('content')
<div class="row">
          <div class="col-md-12">

          @if (session('status'))
            <div class="alert alert-success my-3">
              {{ session('status') }}
            </div>
          @endif
          @if (session('failed'))
            <div class="alert alert-danger my-3">
              {{ session('failed') }}
            </div>
          @endif
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
            
              <div class="card-header mb-4">
                <h4 class="card-title d-inline">Table Data Barang</h4>
                <div class="btn-group float-right mb-3">
                    <div class="btn-group dropleft" role="group">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Action Button</span>
                        </button>
                        <div class="dropdown-menu">
                        <a href="{{'/barang/add'}}" class="btn btn-outline-primary btn-sm my-2">
                            Tambah Data Barang
                        </a>
                        <a href="#" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#importExcel">
                            Import Data Barang
                        </a>
                        <a href="/export/{{'barang'}}" class="btn btn-outline-warning btn-sm">
                            Export Data Barang
                        </a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-info btn-sm">
                    Action Button
                    </button>
            </div>
              <form action="/search/barang" method="post" class="my-4">
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
                        Kode Barang
                      </th>
                      <th>
                        Nama Barang
                      </th>
                      <th>
                        Jenis Barang
                      </th>
                      <th class="text-right">
                        Tanggal Barang Masuk
                      </th>
                      <th></th>
                    </thead>
                    <tbody>
                    @foreach($barang as $brg)
                      <tr>
                        <td>{{$brg->kd_barang}}</td>
                        <td>{{$brg->nama_brg}}</td>
                        <?php
                        if ($brg->jenis_brg == 'Elektronik') {
                          ?>
                          <td><button class="btn btn-sm btn-outline-warning">{{$brg->jenis_brg}}</button></td>
                        <?php
                        }else{
                          ?>
                          <td><button class="btn btn-sm btn-outline-success">{{$brg->jenis_brg}}</button></td>
                          <?php
                        }
                        ?>
                        <td class="text-right">{{$brg->created_at}}</td>
                        <td>
                          <a href="/show/barang/{{$brg->id}}"class="badge badge-success">Info</a>
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

          		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="{{'/barang/import_excel'}}" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
						@csrf
 
							<label>Pilih file excel</label>
								<input type="file" name="file" class="form-control col-md-10" required="required">
                <hr>
                <?php $path = url('files/contohBarang.xlsx')?>
                <a href="{{url($path)}}" ><i>Contoh File</i></a>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
@endsection