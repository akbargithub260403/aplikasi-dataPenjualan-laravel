<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Supplier;
use App\Barang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.index',['transaksi' => $transaksi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($data)
    {
        $kd_transaksi = rand(0,100000000);

        $barang = Barang::where('id','=',$data)->get();
        foreach($barang as $dt){
            $nama_brg   = $dt->nama_brg;
            $barang_tersedia = $dt->jumlah_brg;
        }

        return view('transaksi.create',['kd_transaksi' => $kd_transaksi , 'nama_brg' => $nama_brg , 'barang_tersedia' => $barang_tersedia]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kd_supplier'           => 'required',
            'nama_brg'              => 'required',
            'jumlah_brg'            => 'required',
            'keterangan'            => 'required'
        ]);

        $kd_supplier        = $request->kd_supplier;
          
        if (Supplier::where('kd_supplier','=',$kd_supplier)->first() != null) {

            $supplier   = Supplier::where('kd_supplier','=',$kd_supplier)->get();

            foreach($supplier as $sp){
                $nama_supplier      = $sp->nama_supplier;
            }

            $data = Barang::where('nama_brg','=',$request->nama_brg)->get();

            foreach($data as $dt){
                $kd_barang          = $dt->kd_barang;
                $barang_tersedia    = $dt->jumlah_brg;
            }

            if ($request->jumlah_brg > $barang_tersedia) {
                
                    return redirect('/data_barang')->with('failed','Jumlah Barang tidak boleh melebihi Stok barang');

            }elseif ($request->jumlah = $barang_tersedia) {
                
                    $jumlah_brg     = $barang_tersedia - $request->jumlah_brg;
                    
                    Transaksi::create([
                        'kd_transaksi'      => $request->kd_transaksi,
                        'kd_supplier'       => $kd_supplier,
                        'kd_barang'         => $kd_barang,
                        'nama_supplier'     => $nama_supplier,
                        'nama_brg'          => $request->nama_brg,
                        'jumlah_brg'        => $request->jumlah_brg,
                        'keterangan'        => $request->keterangan
                    ]);

                    Barang::where('nama_brg',$request->nama_brg)
                    ->update([
                        'jumlah_brg'        => $jumlah_brg
                    ]);

                    return redirect('/data_transaksi')->with('status','Data Transaksi Berhasil Ditambahkan');

            }elseif ($request->jumlah == 0) {
                
                    return redirect('/data_barang')->with('failed','Jumlah barang tidak boleh 0');

            }else{
                
                    $jumlah_brg     = $barang_tersedia - $request->jumlah_brg;
                    
                    Transaksi::create([
                        'kd_transaksi'      => $request->kd_transaksi,
                        'kd_supplier'       => $kd_supplier,
                        'kd_barang'         => $kd_barang,
                        'nama_supplier'     => $nama_supplier,
                        'nama_brg'          => $request->nama_brg,
                        'jumlah_brg'        => $request->jumlah_brg,
                        'keterangan'        => $request->keterangan
                    ]);
        
                    Barang::where('nama_brg',$request->nama_brg)
                    ->update([
                        'jumlah_brg'        => $jumlah_brg
                    ]);
        
                    return redirect('/data_transaksi')->with('status','Data Transaksi Berhasil Ditambahkan');
            }


        }else{
            
            return redirect('/data_barang')->with('failed','Kode Supplier Tidak ditemukan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksi.detail',['transaksi' => $transaksi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {   
        $data = Barang::where('kd_barang','=',$transaksi->kd_barang)->get();

        foreach($data as $dt)
        {
            $jumlah_brg     = $dt->jumlah_brg;
        }

        $jumlah_brg_update  = $jumlah_brg + $transaksi->jumlah_brg;

        Barang::where('kd_barang',$transaksi->kd_barang)
        ->update([
            'jumlah_brg'        => $jumlah_brg_update
        ]);

        Transaksi::destroy($transaksi->id);

        return redirect('/data_transaksi')->with('status','Data berhasil Dihapus');
    }

    public function barcode($transaksi)
    {
        \QrCode::size(500)

        ->format('png')

        ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));

        return view('qrCode');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $transaksi     = DB::table('transaksi')
                        ->where('kd_transaksi','LIKE',"%".$keyword."%")
                        ->orWhere('kd_barang','LIKE',"%".$keyword."%")
                        ->orWhere('nama_supplier','LIKE',"%".$keyword."%")
                        ->get();
        
        return view('transaksi.index',['transaksi' => $transaksi]);
    }
}
