<?= $this->extend('template/index') ?>


<?= $this->section('page-content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Kategori</h1>
    <p>Isi form di bawah ini untuk menambahkan kategori baru</p>
    <form method="POST" action="/kategori/simpan" enctype="multipart/form-data">
        <div class="form-group">
            <label class="font-weight-bold">Id Kategori</label>
            <input type="text" name="idKategori" class="form-control" placeholder="Masukan nama kategori" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Nama Kategori</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan nama kategori" autocomplete="off">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Simpan Kategori</button>
        </div>
    </form>
</div>
<?= $this->endSection('page-content') ?>