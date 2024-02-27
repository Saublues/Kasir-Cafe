<?= $this->extend('template/index') ?>


<?= $this->section('page-content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List User</h6>
        </div>
        <div class="card-body">
            <a href="/user/tambah" class="btn btn-info btn-md text-capitalize mb-3 mr-5" data-mdb-ripple-color="dark"><i class="fas fa-plus text-light"></i> Tambah User</a>
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success" role="alert"> User baru telah ditambahkan';
                session()->getFlashdata('pesan');
                echo ' </div>';
            }
            if (session()->getFlashdata('delete')) {
                echo '<div class="alert alert-danger" role="alert"> User telah dihapus';
                session()->getFlashdata('pesan');
                echo ' </div>';
            }
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light text-center">
                        <tr class="table table-primary">
                            <th>No</th>
                            <th>NIP</th>
                            <th>Fullname</th>
                            <th>Level</th>
                            <?php if (session()->get('level') == 'admin') { ?>
                                <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $htmlData = null;
                        $nomor = null;
                        if (isset($listUser)) {
                            foreach ($listUser as $row) {
                                $nomor++;
                                $htmlData = '<tr>';
                                $htmlData .= '<td class="text-center" style="width: 20px;"> ' . $nomor . '</td>';
                                $htmlData .= '<td class="text-center">' .
                                    $row['id_user'] . '</td>';
                                $htmlData .= '<td class="text-center">' .
                                    $row['fullname'] . '</td>';
                                $htmlData .= '<td class="text-center">' .
                                    $row['level'] . '</td>';
                                if (session()->get('level') == 'admin') {
                                    $htmlData .= '<td class="text-center">';
                                    $htmlData .= '<a href="/user/edit/' . $row['id_user'] . '" class="btn btn-info btn-sm mr-1"><i class="fas fa-fw fa-edit"></i></a>';
                                    $htmlData .= '<a href="/user/hapus/' . $row['id_user'] . '" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></a>';
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