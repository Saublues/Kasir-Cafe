<?= $this->extend('template/index') ?>


<?= $this->section('page-content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Penjualan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light text-center">
                        <tr class="table-primary">
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Harga Menu</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $nomor = 1;
                        foreach ($listDetail as $row) : ?>
                            <tr>
                                <td class="text-center" style="width: 20px;"><?= $nomor++; ?></td>
                                <td class="text-center"><?= $row['nama_menu'] ?></td>
                                <td class="text-center"><?= number_to_currency($row['harga'], 'IDR') ?></td>
                                <td class="text-center"><?= $row['qty'] ?></td>
                                <td class="text-center"><?= number_to_currency($row['subtotal'], 'IDR') ?></td>
                                <td class="text-center"><?= $row['tanggal'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div <?= $this->endSection('page-content') ?>