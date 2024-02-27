<?= $this->extend('template/index') ?>


<?= $this->section('page-content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Cashier</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h3 class="m-0 font-weight-bold text-primary">Menu Pembelian</h3>
            <?php
            $keranjang = $cart->contents();
            $jumlah = 0;
            foreach ($keranjang as $key => $value) {
                $jumlah = $jumlah + $value['qty'];
            }
            ?>
            <a href="/penjualan/keranjang" class="nav-link btn btn-info mx-3"><i class="fa fa-shopping-cart mx-2"></i>
                <span class="badge badge-danger navbar-badge"><?= $jumlah ?></span>
            </a>
        </div>
        <div class="row row-cols-5 row-cols-md-5 g-4 m-3">
            <div class="col-lg-12">
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert"> Menu telah ditambahkan';
                    session()->getFlashdata('pesan');
                    echo ' </div>';
                }
                ?>
            </div>
            <?php foreach ($listMenu as $value) : ?>
                <div class="card m-4 border-left-primary border-bottom-primary" style="width: 16rem;">
                    <?php
                    echo form_open('/penjualan/add');
                    echo form_hidden('id', $value['id_menu']);
                    echo form_hidden('price', $value['harga_menu']);
                    echo form_hidden('name', $value['nama_menu']);
                    echo form_hidden('gambar', $value['gambar']);
                    ?>
                    <img src="/img/<?= $value['gambar'] ?>" class="card-img-top" alt="..." height="200px">
                    <div class="card-body">
                        <h4 class="btn btn-secondary text-light" style="width: 100%;"><b><?= $value['nama_menu'] ?></b></h4>
                        <h5><span class="btn btn-secondary text-light" style="width: 100%;"><?= number_to_currency($value['harga_menu'], 'IDR') ?></span></h5>
                        <button class="btn btn-success btn-sm" style="width: 100%;" data-toggle="modal">
                            Tambah
                        </button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            <?php endforeach ?>
        </div>
    </div>

</div>
<!-- Button trigger modal -->

<!-- Modal -->


<?= $this->endSection('page-content') ?>