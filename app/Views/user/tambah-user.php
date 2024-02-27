<?= $this->extend('template/index') ?>


<?= $this->section('page-content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>
    <p>Isi form di bawah ini untuk menambahkan user baru</p>
    <form method="POST" action="/user/simpan">
        <div class="form-group">
            <label class="font-weight-bold">NIP</label>
            <input type="text" name="nip" class="form-control" placeholder="Masukan NIP" autocomplete="off" autofocus>
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Nama Lengkap</label>
            <input type="text" name="fullname" class="form-control" placeholder="Masukan nama lengkap" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukan password" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Level Petugas</label>
            <select name="selectLevel" class="form-control">
                <option value="admin">Admin</option>
                <option value="pegawai">Pegawai Kasir</option>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Simpan Petugas</button>
        </div>
    </form>
</div>
<?= $this->endSection('page-content') ?>