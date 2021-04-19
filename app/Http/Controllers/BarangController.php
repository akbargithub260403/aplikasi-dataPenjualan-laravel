<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Supplier;
use App\Transaksi;
use App\Imports\ImportBarang;

use File;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index',['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kd_barang = rand(0,100000000);

        return view('barang.create',['kd_barang' => $kd_barang]);
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
            'kd_barang'         => 'required',
            'nama_brg'          => 'required',
            'jenis_brg'         => 'required',
            'jumlah_brg'        => 'required',
            'merk'              => 'required',
            'keterangan'        => 'required'
        ]);
        
        Barang::create([
            'kd_barang'         => $request->kd_barang,
            'nama_brg'          => $request->nama_brg,
            'jenis_brg'         => $request->jenis_brg,
            'jumlah_brg'        => $request->jumlah_brg,
            'merk'              => $request->merk,
            'keterangan'        => $request->keterangan,
            'gambar'            => ''
        ]);

        return back()->with('status','Data Barang berhasil Dimasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        return view('barang.detail',['barang' => $barang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('barang.update',['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $this->Validate($request,[
            'gambar'        => 'required|file|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048'
        ]);

        $avatar = Barang::where('id',$barang->id)->first();
        
        File::delete('images/gambar/'.$avatar->gambar);

         // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('gambar');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images/gambar';

        $file->move($tujuan_upload,$nama_file);

        Barang::where('id' , $barang->id)
        ->update([
            'nama_brg'      => $request->nama_brg,
            'jenis_brg'     => $request->jenis_brg,
            'merk'          => $request->merk,
            'jumlah_brg'    => $request->jumlah_brg,
            'keterangan'    => $request->keterangan,
            'gambar'        => $nama_file
        ]);

        return redirect('/data_barang')->with('status','Data Barang Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);

        return redirect('/data_barang')->with('status','Data Berhasil Dihapus');
    }

    public function export($data)
    {
        if ($data == 'barang') {
            $data = Barang::all();
            return view('barang.export',['data' => $data]);
            
        }elseif ($data == 'supplier') {
            $data = Supplier::all();
            return view('supplier.export',['data' => $data]);
        }elseif ($data == 'transaksi') {
            $data = Transaksi::all();
            return view('transaksi.export',['data' => $data]);
        }

        return redirect('/home');
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
		Excel::import(new ImportBarang, public_path('/files/'.$nama_file));
 
		// alihkan halaman kembali
		return redirect('/data_barang')->with('status','Data Berhasil Dimasukan');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $barang     = DB::table('barang')
                        ->where('kd_barang','LIKE',"%".$keyword."%")
                        ->orWhere('nama_brg','LIKE',"%".$keyword."%")
                        ->orWhere('jenis_brg','LIKE',"%".$keyword."%")
                        ->get();
        
        return view('barang.index',['barang' => $barang]);
    }
}
