<?= $this->extend('template/index') ?>


<?= $this->section('page-content') ?>
<div class="container-fluid">
    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <!-- Menu-->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Menu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_menu ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-book fa-2x text-gray-800"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kategori-->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_kategori ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-clipboard-list fa-2x text-gray-800"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pendapatan hari ini-->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pendapatan Hari Ini</div>
                            <?php foreach ($hari_ini->getResultArray() as $key => $value) : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php if ($value['total_pendapatan'] != '') {
                                        echo number_to_currency($value['total_pendapatan'], 'IDR');
                                    } else {
                                        echo 'IDR 0';
                                    } ?></div>
                            <?php endforeach ?>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-money-bill fa-2x text-gray-800"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pendapatan Bulanan -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pendapatan Bulan <?= date('M') ?></div>
                            <?php foreach ($bulan_ini->getResultArray() as $key => $value) : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php if ($value['total'] != '') {
                                        echo number_to_currency($value['total'], 'IDR');
                                    } else {
                                        echo 'IDR 0';
                                    } ?></div>
                            <?php endforeach ?>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-money-bill fa-2x text-gray-800"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Grafik Bulanan</h6>
        </div>
        <div class="card-body">
            <div class="chart-bar">
                <canvas id="myChart" width="200" height="50"></canvas>
            </div>
            <hr>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>/vendor/chart.js/Chart.min.js"></script>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Bar Chart Example
    var ctx = document.getElementById("myChart");
    var periode = [];
    var pendapatan = [];
    <?php foreach ($total->getResultArray() as $key => $value) : ?>

        periode.push(<?= $value['Periode'] ?>);
        pendapatan.push(<?= $value['total_pendapatan'] ?>);

    <?php endforeach ?>
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: periode,
            datasets: [{
                label: 'Grafik Pendapatan Bulanan',
                data: pendapatan,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',

                ],
                borderColor: [
                    'rgba(54, 162, 235, 0.2)',

                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?= $this->endSection('page-content') ?>