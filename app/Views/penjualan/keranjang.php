<?= $this->extend('template/index') ?>


<?= $this->section('page-content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Cart</h1>
    <div class="card">
        <?php
        echo form_open('penjualan/update')
        ?>
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Cart Menu</p>
                    </div>
                    <div class="col-lg-12">
                        <?php
                        if (session()->getFlashdata('pesan1')) {
                            echo '<div class="alert alert-success" role="alert"> Telah Melakukan Pembayaran';
                            session()->getFlashdata('pesan1');
                            echo ' </div>';
                        }
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success" role="alert"> Menu telah ditambahkan';
                            session()->getFlashdata('pesan2');
                            echo ' </div>';
                        }
                        ?>
                    </div>
                    <div class="col-xl-6 float-end">
                        <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a>
                        <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i class="far fa-file-pdf text-danger"></i> Export</a>
                        <a href="/penjualan/reset" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i class="fa fa-trash text-danger"></i> Reset Cart</a>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr class="text-center">
                                    <th width="100px">Qty</th>
                                    <th>Nama Menu</th>
                                    <th>Harga Menu</th>
                                    <th>Sub Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = 1;
                                foreach ($cart->contents() as $key => $value) { ?>
                                    <tr class="text-center">
                                        <td><input type="number" min="1" name="qty<?= $a++; ?>" class="form-control" value="<?= $value['qty'] ?>"></td>
                                        <td><?= $value['name'] ?></td>
                                        <td><?= number_to_currency($value['price'], 'IDR') ?></td>
                                        <td><?= number_to_currency($value['subtotal'], 'IDR') ?></td>
                                        <td>
                                            <a href="/penjualan/remove/<?= $value['rowid'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <p class="ms-3">Add additional notes and payment information</p>

                        </div>
                        <div class="col-xl-3">
                            <p class="text-black float-start"><span class="text-black me-3" style="font-size: 25px;"> Total : </span><span style="font-size: 25px;"><?= number_to_currency($cart->total(), 'IDR'); ?></span></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-10">
                            <button class="btn btn-success text-capitalize">Update</button>
                        </div>
                        <?php
                        echo form_close();
                        ?>
                        <div class="col-xl-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayar" style="background-color:#60bdf3 ;">
                                Pembayaran
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/penjualan/pembayaran" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="font-weight-bold">Total Harga</label>
                        <input type="text" name="total" id="total" class="form-control" value="<?= $cart->total(); ?>" readonly>
                    </div>
                    <script>
                        function hasil(value) {
                            var x = document.getElementById('total').value;
                            var z = document.getElementById('uang').value;
                            var hasil = z - x;
                            document.getElementById('kembali').value = hasil;
                        }
                    </script>
                    <div class="form-group">
                        <label class="font-weight-bold">Nama Kasir</label>
                        <select name="kasir" id="kasir" class="form-control">
                            <option value="<?= session()->get('id_user') ?>"><?= session()->get('fullname') ?></option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal</label>
                        <input type="text" name="tanggal" class="form-control" value="<?= Date('Y-m-d') ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Jam</label>
                        <input type="text" name="jam" class="form-control" value="<?= Date('h:i:sa ') ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Uang</label>
                        <input type="text" name="uang" id="uang" onkeyup="hasil(this.value)" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Kembali</label>
                        <input type="text" name="kembali" id="kembali" class="form-control" readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Confirm</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('page-content') ?>