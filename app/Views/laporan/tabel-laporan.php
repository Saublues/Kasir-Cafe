<link href="<?= base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

<!-- Custom styles for this template-->
<link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet" />

<link href="<?= base_url() ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="row">
    <div class="col-12 text-center">

        <address>
            <i class="fas fa-shopping-cart fa-3x"></i>
            <b>
                <font size="9">Saubluu Cafe</font>
            </b><br>
            <strong>Kwangya</strong><br>
            No. Telp : 0111-1111<br>
        </address>

    </div>
    <!-- /.col -->
    <div class="col-12 text-center">
        <hr>
        <b>
            <h4><b>Laporan Harian</b></h4>
        </b>
    </div>
    <div class="col-12">
        <b>Tanggal :</b> <?= $tglawal ?>
        <table class="table table-bordered table-striped">
            <tr class="text-center">
                <th>No</th>
                <th>Id Penjualan</th>
                <th>Id User</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Total Harga</th>
            </tr>
            <?php $no = 1;
            foreach ($datalaporan as $key => $value) {
                $grandtotal[] = $value['total_harga'];
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= $value['id_penjualan'] ?></td>
                    <td class="text-center"><?= $value['id_user'] ?></td>
                    <td class="text-center"><?= $value['tanggal_jual'] ?></td>
                    <td class="text-center"><?= $value['jam'] ?></td>
                    <td class="text-right">Rp. <?= number_format($value['total_harga'], 0) ?></td>
                </tr>
                <tr>
                <?php } ?>
                <td class="text-center bg-gray" colspan="5">
                    <h5>Grand Total</h5>
                </td>
                <td class="text-right">Rp. <?= $datalaporan == null ? '' : number_format(array_sum($grandtotal), 0)  ?></td>
                </tr>
        </table>
    </div>
</div>
<script>
    window.addEventListener("load", window.print());
</script>