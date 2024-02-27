<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

use CodeIgniter\I18n\Time;


class UserController extends BaseController
{

    public function index(): string
    {
        return view('auth/login');
    }

    public function login()
    {
        $dataUser = new User;
        $syarat = [
            'id_user' => $this->request->getPost('username'),
            'password' => ($this->request->getPost('password'))
        ];
        $user =
            $dataUser->where($syarat)->find();
        if (count($user) == 1) {
            $session_data = [
                'id_user' => $user[0]['id_user'],
                'fullname' => $user[0]['fullname'],
                'level' => $user[0]['level'],
                'sudahkahLogin' => TRUE
            ];
            session()->set($session_data);
            return redirect()->to('/user/dashboard');
        } else {
            return redirect()->to('/')->with('pesan', '<div class="text-center mt-3 font-weight-bold`"><p class="text-danger fw-bold">Username atau Password salah harap cek kembali</p></div>');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/user');
    }

    public function tampilUser()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/user');
            exit;
        }
        $dataUser = new User;
        $data['listUser'] = $dataUser->findAll();
        $data['title'] = 'Kelola User';
        return view('user/tampil-user', $data);
    }

    public function tambahUser()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/user');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/user/dashboard');
            exit;
        }
        return view('user/tambah-user');
    }

    public function simpanUser()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/user');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/user/dashboard');
            exit;
        }
        helper(['form']);
        $dataUser = new User;
        $data = [
            'id_user' => $this->request->getPost('nip'),
            'fullname' => $this->request->getPost('fullname'),
            'password' => ($this->request->getPost('password')),
            'level' => $this->request->getPost('selectLevel')
        ];
        $dataUser->ignore(true)->insert($data);
        session()->setFlashdata('pesan', 'value');
        return redirect()->to('/user/tampil');
    }

    public function editUser($idUser)
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
        $dataUser = new User;
        $data['detailUser'] = $dataUser->where('id_user', $idUser)->findAll();
        return view('/user/edit-user', $data);
    }

    public function updateUser()
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
        $dataUser = new User;
        if ($this->request->getPost('nip')) {
            $data = [
                // 'id_user' => $this->request->getPost('nip'),
                'id_user' => $this->request->getPost('nip'),
                'fullname' => $this->request->getPost('fullname'),
                'password' => ($this->request->getPost('password')),
                'level' => $this->request->getPost('selectLevel')
            ];
        } else {
            $data = [
                'fullname' => $this->request->getPost('fullname'),
                'level' => $this->request->getPost('selectLevel')
            ];
        }
        $dataUser->ignore(true)->update($this->request->getPost('nip'), $data);
        return redirect()->to('/user/tampil');
    }
    public function hapusUser($idUser)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/user');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/user/dashboard');
            exit;
        }
        $dataUser = new User;
        $dataUser->where('id_user', $idUser)->delete();
        session()->setFlashdata('delete', 'value');
        return redirect()->to('/user/tampil');
    }
}
