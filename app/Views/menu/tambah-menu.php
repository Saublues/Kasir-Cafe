<?= $this->extend('template/index') ?>


<?= $this->section('page-content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Menu</h1>
    <p>Isi form di bawah ini untuk menambahkan menu baru</p>
    <form method="POST" action="/menu/simpan" enctype="multipart/form-data">
        <div class="form-group">
            <label class="font-weight-bold">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control" placeholder="Masukan Nama Menu" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Nama Kategori</label>
            <select name="nama_kategori" id="selectKat" class="form-control">
                <option value="">Pilih Kategori</option>
                <?php foreach ($detailKategori as $row) {
                    echo '<option value="' . $row['nama_kategori'] . ' ">' . $row['nama_kategori'] . '</option>';
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Harga Menu</label>
            <input type="text" name="harga" class="form-control" placeholder="Harga Menu" autocomplete="off">
        </div>
        <div class="form-group">
            <label class="font-weight-bold">Gambar</label>
            <input type="file" name="gambar" class="form-control" onchange="loadFile(event)" placeholder="Gambar" autocomplete="off">
        </div>
        <img id="output" class="rounded img-thumbnail mb-3" alt="..." width="300px" height="300px">
        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };
        </script>
        <div class="form-group">
            <button class="btn btn-primary">Simpan Menu</button>
        </div>
    </form>
</div>
<?= $this->endSection('page-content') ?>