<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Menu;
use App\Models\Kategori;
use CodeIgniter\HTTP\ResponseInterface;

class MenuController extends BaseController
{
    public function __construct()
    {
        helper('number');
    }

    public function index()
    {
        $dataMenu = new Menu;
        $currentPage = $this->request->getVar('/menu/tampil') ? $this->request->getVar('/menu/tampil') : 1;

        $data['listMenu'] =
            $dataMenu->orderBy('id_menu', 'nama_menu', 'nama_kategori', 'harga_menu', 'gambar')->paginate(7, 'menu');
        $data['pager'] = $dataMenu->pager;
        $data['currentPage'] = $currentPage;
        $data['title'] = 'Kelola Menu';
        return view('/menu/tampil-menu', $data);
    }

    public function tambahMenu()
    {
        $dataKategori = new Kategori();
        $data['detailKategori'] = $dataKategori->findAll();
        return view('menu/tambah-menu', $data);
    }

    public function simpanMenu()
    {
        $dataMenu = new Menu;
        $file = $this->request->getFile('gambar');
        $namaFile = $file->getRandomName();
        $file->move('img', $namaFile);

        $data = [
            'id_menu' => $this->request->getPost('id_menu'),
            'nama_menu' => $this->request->getPost('nama_menu'),
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'harga_menu' => $this->request->getPost('harga'),
            'gambar' => $namaFile

        ];
        $dataMenu->ignore(true)->insert($data);
        session()->setFlashdata('pesan', 'value');

        return redirect()->to('/menu/tampil');
    }

    public function editMenu($idMenu)
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
        $dataMenu = new Menu();
        $dataKategori = new Kategori();
        $data['detailKategori'] = $dataKategori->findAll();
        $data['detailMenu'] = $dataMenu->where('id_menu', $idMenu)->findAll();
        return view('/menu/edit-menu', $data);
    }

    public function updateMenu()
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/user');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/user/dashboard');
            exit;
        }
        $dataMenu = new Menu;
        if ($this->request->getPost('id_menu')) {
            $data = [
                // 'id_user' => $this->request->getPost('nip'),
                'nama_menu' => $this->request->getPost('nama_menu'),
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'harga_menu' => $this->request->getPost('harga')
            ];
        } else {
            $data = [
                'nama_menu' => $this->request->getPost('nama_menu'),
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'harga_menu' => $this->request->getPost('harga')
            ];
        }
        $dataMenu->ignore(true)->update($this->request->getPost('id_menu'), $data);
        return redirect()->to('/menu/tampil');
    }
    public function hapusMenu($idMenu)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/menu');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/menu/dashboard');
            exit;
        }
        $dataMenu = new Menu;
        $dataMenu->where('id_menu', $idMenu)->delete();
        session()->setFlashdata('delete', 'value');
        return redirect()->to('/menu/tampil');
    }

    public function searchMenu()
    {
        $dataMenu = new Menu;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $dataMenu->search($keyword);
        } else {
            $dataMenu;
        }
        return view('/menu/tampil', $keyword);
    }
}
