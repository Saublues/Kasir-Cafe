<?= $this->extend('template/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit User</h1>
    <hr>
    <p>Silahkan gunakan form di bawah ini untuk mengedit user</p>
    <form method="POST" action="/user/update">
        <input type="hidden" name="nip" class="form-control" placeholder="Masukan NIP" value="<?= $detailUser[0]['id_user']; ?>">
        <div class="form-group">
            <label class="font-weight-bold">Nama Lengkap</label>
            <input type="text" name="fullname" class="form-control" placeholder="Masukan nama lengkap" value="<?= $detailUser[0]['fullname']; ?>">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Password</label>
            <input type="text" name="password" class="form-control" placeholder="Masukan password terbaru" value="<?= $detailUser[0]['password']; ?>" autocomplete="off" autofocous reaquire>
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Level User</label>
            <select name="selectLevel" class="form-control">
                <option <?= $detailUser[0]['level'] == 'admin' ?
                            'selected' : null; ?> value="admin">Admin</option>
                <option <?= $detailUser[0]['level'] == 'petugas' ?
                            'selected' : null; ?> value="pegawai">Pegawai</option>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Update User</button>
        </div>
    </form>
</div>
<?= $this->endSection('page-content') ?>