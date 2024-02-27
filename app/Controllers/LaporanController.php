<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Penjualan;
use App\Models\Menu;
use App\Models\Kategori;

class LaporanController extends BaseController
{

    public function __construct()
    {
        helper('number');
        helper('form');
    }

    public function tampil()
    {
        $dataPenjualan = new Penjualan;
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');
        $data = [
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir,
            'datalaporan' => $dataPenjualan->findAll(),
            'title' => 'Laporan Harian'
        ];


        return view('laporan/tampil-laporan', $data);
    }

    public function ViewLaporanHarian($tgl)
    {
        $penjualan = new penjualan;
        $tgl = $this->request->getPost('tgl');
        $dataharian = $penjualan->select('*')->where('tanggal_jual', $tgl)->orderBy('id_penjualan')->selectSum('total_harga')->get()->getResultArray();

        $data = [
            'dataharian' => $dataharian($tgl),
            'tgl' => $tgl
        ];

        $response['data'] = view('/laporan/tabel-laporan', $data);

        echo json_encode($response);
    }

    public function print()
    {
        $dataPenjualan = new Penjualan;
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');

        $dataLaporan = $dataPenjualan->laporan($tglawal, $tglakhir)->get()->getResultArray();

        $data = [
            'datalaporan' => $dataLaporan,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir,
            'page' => 'laporan/template-print'

        ];

        return view('/laporan/tabel-laporan', $data);
    }
    public function printMonth()
    {
        $dataPenjualan = new Penjualan;
        $tglawal = $this->request->getPost('tglawal');

        $dataLaporan = $dataPenjualan->laporanMonth($tglawal)->get()->getResultArray();

        $data = [
            'datalaporan' => $dataLaporan,
            'tglawal' => $tglawal,
            'page' => 'laporan/template-print'

        ];

        return view('/laporan/tabel-laporan', $data);
    }
    public function view()
    {
        $dataPenjualan = new Penjualan;
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');

        $dataLaporan = $dataPenjualan->laporan($tglawal, $tglakhir)->get()->getResultArray();

        $data = [
            'datalaporan' => $dataLaporan,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir
        ];

        return view('/laporan/tampil-laporan', $data);
    }
    public function month()
    {
        $dataPenjualan = new Penjualan;
        $tglawal = $this->request->getPost('tglawal');

        $dataLaporan = $dataPenjualan->laporanMonth($tglawal)->get()->getResultArray();

        $data = [
            'datalaporan' => $dataLaporan,
            'tglawal' => $tglawal,

        ];

        return view('/laporan/laporan-bulanan', $data);
    }
    public function viewMonth()
    {
        $dataPenjualan = new Penjualan;
        $tglawal = $this->request->getPost('tglawal');
        $data = [
            'tglawal' => $tglawal,
            'datalaporan' => $dataPenjualan->findAll(),
            'title' => 'Laporan Bulanan'

        ];


        return view('laporan/laporan-bulanan', $data);
    }
}
