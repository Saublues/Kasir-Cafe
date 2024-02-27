<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori;


class KategoriController extends BaseController
{
    public function index()
    {
        $dataKategori = new Kategori;
        $data['listKategori'] =
            $dataKategori->orderBy('id_kategori', 'nama_kategori')->findAll();
        $data['title'] = 'Kelola Kategori';
        return view('/kategori/tampil-kategori', $data);
    }


    public function tambahKategori()
    {
        return view('kategori/tambah-kategori');
    }

    public function simpanKategori()
    {
        $dataKategori = new Kategori;
        $data = [
            'id_kategori' => $this->request->getPost('idKategori'),
            'nama_kategori' => $this->request->getPost('nama')
        ];
        $dataKategori->ignore(true)->insert($data);
        session()->setFlashdata('pesan', 'value');
        return redirect()->to('/kategori/tampil');
    }

    public function editKategori($idKategori)
    {
        // cek apakah sudah login ?
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/user');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/user/dashboard');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/user/dashboard');
            exit;
        }
        $dataKategori = new Kategori();
        $data['detailKategori'] = $dataKategori->where('id_kategori', $idKategori)->findAll();
        return view('/kategori/edit-kategori', $data);
    }

    public function updateKategori()
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/kategori');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/kategori/dashboard');
            exit;
        }
        $dataKategori = new Kategori();
        if ($this->request->getPost('nama')) {
            $data = [
                'nama_kategori' => $this->request->getPost('nama')
            ];
        } else {
            $data = [
                'nama_kategori' => $this->request->getPost('nama')
            ];
        }
        $dataKategori->ignore(true)->update($this->request->getPost('idKategori'), $data);
        return redirect()->to('/kategori/tampil');
    }
    public function hapusKategori($idKategori)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/kategori');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/kategori/dashboard');
            exit;
        }
        $dataKategori = new Kategori;
        $dataKategori->where('id_kategori', $idKategori)->delete();
        session()->setFlashdata('delete', 'value');
        return redirect()->to('/kategori/tampil');
    }
}
