<?= $this->extend('template/index') ?>


<?= $this->section('page-content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Menu</h6>
        </div>
        <div class="card-body">
            <a href="/menu/tambah" class="btn btn-info btn-md text-capitalize mb-3" data-mdb-ripple-color="dark"><i class="fas fa-plus text-light"></i> Tambah Menu</a>
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success" role="alert"> Menu baru telah ditambahkan';
                session()->getFlashdata('pesan');
                echo ' </div>';
            }
            if (session()->getFlashdata('delete')) {
                echo '<div class="alert alert-danger" role="alert"> Menu telah dihapus';
                session()->getFlashdata('delete');
                echo ' </div>';
            }
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light text-center">
                        <tr class="table-primary">
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Nama Kategori</th>
                            <th>Harga Menu</th>
                            <th>Gambar</th>
                            <?php if (session()->get('level') == 'admin') { ?>
                                <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $nomor = 1;
                        foreach ($listMenu as $row) : ?>
                            <tr>
                                <td class="text-center" style="width: 20px;"><?= $nomor++; ?></td>
                                <td class="text-center"><?= $row['nama_menu'] ?></td>
                                <td class="text-center"><?= $row['nama_kategori'] ?></td>
                                <td class="text-center"><?= number_to_currency($row['harga_menu'], 'IDR') ?></td>
                                <td>
                                    <img src="/img/<?= $row['gambar'] ?>" alt="" class="gambar" height="100px" width="100px">
                                </td>
                                <td class="text-center">
                                    <a href="/menu/edit/<?= $row['id_menu'] ?>" class="btn btn-info btn-sm mr-1"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="/menu/hapus/<?= $row['id_menu'] ?>" class="btn btn-danger btn-sm mr-1"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div <?= $this->endSection('page-content') ?>