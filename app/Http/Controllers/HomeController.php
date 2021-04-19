<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Supplier;
use App\Transaksi;
use App\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin      = count(User::all());
        $barang     = count(Barang::all());
        $supplier   = count(Supplier::all());
        $transaksi  = count(Transaksi::all());
        return view('home',['barang' => $barang , 'admin' => $admin , 'supplier' => $supplier , 'transaksi' => $transaksi]);
    }
}
