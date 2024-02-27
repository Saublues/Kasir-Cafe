<?= $this->extend('template/index') ?>

<?= $this->section('page-content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Kategori</h1>
    <hr>
    <p>Silahkan gunakan form di bawah ini untuk mengedit kategori</p>
    <form method="POST" action="/kategori/update">
        <div class="form-group">
            <label class="font-weight-bold">Id Kategori</label>
            <input type="text" name="idKategori" class="form-control" placeholder="Masukan Id Kategori" value="<?= $detailKategori[0]['id_kategori']; ?>">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Nama Kategori</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan nama kategori" value="<?= $detailKategori[0]['nama_kategori']; ?>">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Update Kategori</button>
        </div>
    </form>
</div>
<?= $this->endSection('page-content') ?>