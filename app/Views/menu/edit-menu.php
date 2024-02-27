<?= $this->extend('template/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Menu</h1>
    <hr>
    <p>Silahkan gunakan form di bawah ini untuk mengedit menu</p>
    <form method="POST" action="/menu/update">
        <input type="hidden" name="id_menu" class="form-control" placeholder="Masukan nama lengkap" value="<?= $detailMenu[0]['id_menu']; ?>">
        <div class="form-group">
            <label class="font-weight-bold">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control" placeholder="Masukan nama lengkap" value="<?= $detailMenu[0]['nama_menu']; ?>">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Kategori</label>
            <select name="nama_kategori" id="selectKat" class="form-control">
                <option value="">Pilih Kategori</option>
                <?php foreach ($detailKategori as $row) {
                    $detailMenu[0]['nama_kategori'] == $row['nama_kategori'] ? $pilih = 'selected' : $pilih = null;
                    echo '<option value="' . $row['nama_kategori'] . '"' . $pilih . '>' . $row['nama_kategori'] . '</option>';
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Harga Menu</label>
            <input type="text" name="harga" class="form-control" placeholder="Masukan password terbaru" value="<?= $detailMenu[0]['harga_menu']; ?>" autocomplete="off" autofocous reaquire>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Update Menu</button>
        </div>
    </form>
</div>
<?= $this->endSection('page-content') ?>