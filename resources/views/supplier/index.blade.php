@extends('templates.master')
@section('judul','Halaman Supplier')

@section('content')
<div class="row">
          <div class="col-md-12">

@if (session('status'))
  <div class="alert alert-success my-3">
    {{ session('status') }}
  </div>
@endif
              <div class="card-header">
                <h4 class="card-title d-inline"> Table Data Supplier</h4>
                <div class="btn-group float-right mb-3">
                    <div class="btn-group dropleft" role="group">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Action Button</span>
                        </button>
                        <div class="dropdown-menu">
                        <a href="{{'/supplier/add'}}" class="btn btn-outline-primary btn-sm my-2">
                            Tambah Data Supplier
                        </a>
                        <a href="#" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#importExcel">
                            Import Data Supplier
                        </a>
                        <a href="/export/{{'supplier'}}" class="btn btn-outline-warning btn-sm">
                            Export Data Supplier
                        </a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-info btn-sm">
                    Action Button
                    </button>
                    </div>
                    <form action="/search/supplier" method="post" class="my-4">
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
                        Kode Supplier
                      </th>
                      <th>
                        Nama Supplier
                      </th>
                      <th>
                        Email
                      </th>

                      <th></th>
                    </thead>
                    <tbody>
                    @foreach($data as $dt)
                      <tr>
                        <td>{{$dt->kd_supplier}}</td>
                        <td>{{$dt->nama_supplier}}</td>
                        <td>{{$dt->email_supplier}}</td>
                        <td>
                            <a href="/show/supplier/{{$dt->id}}"class="badge badge-success">Info</a>
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
				<form method="post" action="{{'/supplier/import_excel'}}" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
						@csrf
 
							<label>Pilih file excel</label>
								<input type="file" name="file" class="form-control col-md-10" required="required">
                <hr>
                <?php $path = url('files/contohSupplier.xlsx')?>
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