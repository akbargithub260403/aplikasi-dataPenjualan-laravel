<?php

namespace App\Http\Controllers;

use App\Supplier;
use File;

use App\Imports\ImportSupplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Supplier::all();

        return view('supplier.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kd_supplier = rand(0,100000000);

        return view('supplier.create',['kd_supplier' => $kd_supplier]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request,[
            'kd_supplier'       => 'required',
            'nama_supplier'     => 'required',
            'email_supplier'    => 'required',
            'no_telp'           => 'required|max:13',
            'alamat'            => 'required'
        ]);

        Supplier::create([
            'kd_supplier'       => $request->kd_supplier,
            'nama_supplier'     => $request->nama_supplier,
            'email_supplier'    => $request->email_supplier,
            'no_telp'           => $request->no_telp,
            'alamat'            => $request->alamat,
            'avatar'            => ''
        ]);

        return back()->with('status','Data Supplier Berhasil dimasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('supplier.detail',['supplier' => $supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.update',['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $this->Validate($request,[
            'avatar'        => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'
        ]);

        $avatar = Supplier::where('id',$supplier->id)->first();
        
        File::delete('images/'.$avatar->avatar);

         // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('avatar');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';

        $file->move($tujuan_upload,$nama_file);

        Supplier::where('id',$supplier->id)
        ->update([
            'kd_supplier'       => $request->kd_supplier,
            'nama_supplier'     => $request->nama_supplier,
            'email_supplier'    => $request->email_supplier,
            'no_telp'           => $request->no_telp,
            'alamat'            => $request->alamat,
            'avatar'            => $nama_file
        ]);

        return redirect('/data_supplier')->with('status','Data Supplier Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        Supplier::destroy($supplier->id);

        return redirect('/data_supplier')->with('status','Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $data     = DB::table('supplier')
                        ->where('kd_supplier','LIKE',"%".$keyword."%")
                        ->orWhere('nama_supplier','LIKE',"%".$keyword."%")
                        ->orWhere('email_supplier','LIKE',"%".$keyword."%")
                        ->get();
        
        return view('supplier.index',['data' => $data]);
    }

    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file'          => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('files',$nama_file);
 
		// import data
		Excel::import(new ImportSupplier, public_path('/files/'.$nama_file));
 
		// alihkan halaman kembali
		return redirect('/data_supplier')->with('status','Data Berhasil Dimasukan');
    }
}
