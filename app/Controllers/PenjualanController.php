<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Penjualan;
use App\Models\Menu;
use App\Models\User;
use CodeIgniter\I18n\Time;


class PenjualanController extends BaseController
{
    public function __construct()
    {
        helper('form');
        helper('number');
        $myTime = Time::now('Asia/Jakarta', 'en_US');
    }


    public function index()
    {
        $dataPenjualan = new Penjualan;
        $data['listPenjualan'] = $dataPenjualan->findAll();
        $dataMenu = new Menu;
        $data['listMenu'] =
            $dataMenu->findAll();
        $data['cart'] = \Config\Services::cart();
        return view('/penjualan/tampil-penjualan', $data);
    }

    public function table()
    {
        $dataPenjualan = new Penjualan;
        $data['listPenjualan'] =
            $dataPenjualan->orderBy('id_penjualan')->findAll();
        return view('/penjualan/table-penjualan', $data);
    }

    public function cek()
    {
        $cart = \Config\Services::cart();
        $response = $cart->contents();
        // $data = json_encode($response);
        echo '<pre>';
        print_r($response);
        echo '</pre>';
    }

    public function add()
    {
        $dataPenjualan = new Penjualan;
        $dataMenu = new Menu;
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'      => $this->request->getPost('id'),
            'qty'     => 1,
            'price'   => $this->request->getPost('price'),
            'name'    => $this->request->getPost('name'),
            'options' => array(
                'gambar' => $this->request->getPost('gambar')
            )
        ));
        session()->setFlashdata('pesan', 'value');
        return redirect()->to('penjualan/tampil');
    }

    public function clear()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
    }

    public function remove($rowid)
    {
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->to('penjualan/keranjang');
    }

    public function reset()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to('penjualan/keranjang');
    }

    public function update()
    {
        $cart = \Config\Services::cart();
        $a = 1;
        foreach ($cart->contents() as $key => $value) {
            $cart->update(array(
                'rowid'   => $value['rowid'],
                'qty'     => $this->request->getPost('qty' . $a++),
            ));    # code...
        }
        session()->setFlashdata('pesan', 'Menu berhasil Update');
        return redirect()->to('penjualan/keranjang');
    }

    public function keranjang()
    {
        $dataMenu = new Menu;
        $dataUser = new User();
        $data['cart'] = \Config\Services::cart();
        $data['listMenu'] = $dataMenu->findAll();
        $data['listUser'] = $dataUser->findAll();
        return view('/penjualan/keranjang', $data);
    }

    public function pembayaran()
    {
        $cart = \Config\Services::cart();
        $penjualan = new Penjualan;
        $data = [
            'id_user' => $this->request->getPost('kasir'),
            'total_harga' => $this->request->getPost('total'),
            'tanggal_jual' => $this->request->getPost('tanggal'),
            'jam' => $this->request->getPost('jam'),
            'uang' => $this->request->getPost('uang'),
            'uang_kembali' => $this->request->getPost('kembali')
        ];
        $penjualan->ignore(true)->insert($data);
        $cart->destroy();
        session()->setFlashdata('pesan1', 'Berhasil dibayar');
        return redirect()->to('/penjualan/keranjang');
    }
}
