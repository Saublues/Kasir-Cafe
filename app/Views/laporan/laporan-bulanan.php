<?= $this->extend('template/index') ?>

<?= $this->section('page-content') ?>
<div class="col-md-12">
    <div class="card card-navy">
        <div class="card-header">
            <h3 class="card-title">Laporan Penjualan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="/laporan/month" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Bulan : </label>
                            <select name="tglawal" id="tgl" class="form-control" style="width: 20rem;">
                                <option selected>Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <button class="btn btn-primary btn-flat mr-2">
                        <i class="fas fa-search"></i> Search Based on Month
                    </button>
            </form>
            <form action="/laporan/printMonth" method="post" target="_blank">
                <input type="hidden" name="tglawal" value=<?= $tglawal ?>>
                <button onclick="PrintLaporan()" class="btn btn-dark btn-flat">
                    <i class="fas fa-file"></i> Print Laporan based on Month
                </button>
            </form>
        </div>
        <div class="col-sm-12">
            <hr />
            <div class="tabel">
                <!--  -->
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
                            <h4><b>Laporan</b></h4>
                        </b>
                    </div>
                    <div class="col-12">
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
                            <?php } ?>
                            <td class="text-center bg-gray" colspan="5">
                                <h5>Grand Total</h5>
                            </td>
                            <td class="text-right">Rp. <?= $datalaporan == null ? '' : number_format(array_sum($grandtotal), 0)  ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

<script>
    function ViewTabelLaporan() {
        let tgl = $('#tgl').val();
        $.ajax({
            type: "POST",
            url: <?= base_url('LaporanController/tampil') ?>,
            data: {
                tgl: tgl,
            },
            dataType: "JSON",
            success: function(response) {
                if (response.data) {
                    $('.tabel').html(response.data)
                }
            }
        });
    }

    function PrintLaporan() {
        let tgl = $('#tgl').val();
        if (tgl == '') {
            Swal.fire("Tanggal Belum Dipilih !");
        } else {
            newWin = window.open('<?= ('laporan/print') ?>/' + tgl)
        }
    }
</script>
<?= $this->endSection('page-content') ?>