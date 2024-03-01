<?= $this->extend('template/index') ?>
<?= $this->section('page-content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Kategori</h6>
        </div>
        <div class="card-body">
            <a href="/kategori/tambah" class="btn btn-info btn-md text-capitalize mb-3" data-mdb-ripple-color="dark"><i class="fas fa-plus text-light"></i> Tambah Kategori</a>
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success" role="alert"> Kategori telah ditambahkan';
                session()->getFlashdata('pesan');
                echo ' </div>';
            }
            if (session()->getFlashdata('delete')) {
                echo '<div class="alert alert-danger" role="alert"> Kategori telah dihapus';
                session()->getFlashdata('delete');
                echo ' </div>';
            }
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light text-center">
                        <tr class="table-primary">
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <?php if (session()->get('level') == 'admin') { ?>
                                <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $htmlData = null;
                        $nomor = null;
                        if (isset($listKategori)) {
                            foreach ($listKategori as $row) {
                                $nomor++;
                                $htmlData = '<tr>';
                                $htmlData .= '<td class="text-center" style="width: 20px;">' . $nomor . '</td>';
                                $htmlData .= '<td class="text-center">' .
                                    $row['nama_kategori'] . '</td>';
                                if (session()->get('level') == 'admin') {
                                    $htmlData .= '<td class="text-center">';
                                    $htmlData .= '<a href="/kategori/edit/' . $row['id_kategori'] . '" class="btn btn-info btn-sm mr-1"><i class="fas fa-fw fa-edit"></i></a>';
                                    $htmlData .= '<a href="/kategori/hapus/' . $row['id_kategori'] . '" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></a>';
                                    $htmlData .= '</td>';
                                    $htmlData .= '</tr>';
                                }

                                echo $htmlData;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div <?= $this->endSection('page-content') ?>