<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Penjualan;
use App\Models\Menu;
use App\Models\Kategori;

class Dashboard extends BaseController
{

    public function __construct()
    {
        helper('number');
    }

    public function index()
    {
        $penjualan = new penjualan;
        $menu = new Menu;
        $kategori = new Kategori;
        $total = $penjualan->select("MONTH(tanggal_jual) As 
        Periode, SUM(total_harga)  as total_pendapatan")->groupby("MONTH(tanggal_jual)", date('M'))->where("YEAR(tanggal_jual)", date('Y'))->get();
        $hari_ini = $penjualan->select("SUM(total_harga) as total_pendapatan")->where('DAY(tanggal_jual)', date('d'))->where('MONTH(tanggal_jual)', date('m'))->get();
        $bulan_ini = $penjualan->select("SUM(total_harga) as total")->where('MONTH(tanggal_jual)', date('m'))->where('YEAR(tanggal_jual)', date('Y'))->get();
        $totalMenu = $menu->countAllResults();
        $totalKategori = $kategori->countAllResults();
        return view('index', [
            'total' => $total,
            'total_menu' => $totalMenu,
            'total_kategori' => $totalKategori,
            'hari_ini' => $hari_ini,
            'bulan_ini' => $bulan_ini,
            'title' => 'Dashboard'
        ]);
    }
}
