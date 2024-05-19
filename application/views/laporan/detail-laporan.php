<div class="container-fluid mb-5">

    <div class="col-lg-12">

        <div class="row mt-5">
            <!-- <div class="table-responsive"> -->

            <div class="col-lg-12 p-0 shadow mx-auto">
                <div class="row">
                    <div class="card col-xl-8 p-5 text-dark">
                        <h1 class="font-weight-bold mb-5"><?= $title; ?></h1>
                        <h3 class="font-weight-bold mt-1"><i class="fas fa-futbol text-warning"></i> BCL Futsal</h3>
                        <h4>Perumahan Bumi Citra Lestari</h4>
                        <h4>Cikarang Utara</h4>
                        <h4>Bekasi</h4>
                        <h4>17530</h4>
                    </div>

                    <div class="card col-xl-4 p-5 bg-biru2 d-flex justify-content-center align-content-center">
                        <div class="text-center table-responsive-lg">
                            <h5 class="text-warning font-weight-bold">Pendapatan</h5>
                            <h1 class="text-white font-weight-bold"><?= "Rp " . number_format($laporan['pendapatan'], 0, ',', '.'); ?></h1>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </div> -->

            <div class="card shadow-sm col-lg-12 mx-auto p-2">
                <div class="row justify-content-around">
                    <div class="card col-md-5 m-4 p-0 border-0 text-dark">
                        <p class="font-weight-bold">Id Laporan</p>
                        <p class=" "><?= $laporan['id']; ?></p>
                        <p class="font-weight-bold">Tanggal</p>
                        <p class=" "><?= $laporan['tanggal']; ?></p>
                    </div>
                    <div class="card col-md-5 m-4 p-0 border-0 text-right text-dark">
                        <p class="font-weight-bold">Lapangan Standart</p>
                        <p class=" "><?= $laporan['id']; ?> Pemakaian</p>
                        <p class="font-weight-bold">Lapangan Sintetis</p>
                        <p class=" "><?= $laporan['tanggal']; ?> Pemakaian</p>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="card border-0 shadow-sm">
                        <div class=" pt-4 ">
                            <div id="pie"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-lg-12 p-0">
                <div class="row">
                    <div class="col-md mb-4">
                        <div class="card border-0 shadow">
                            <div class="card-header bg-biru2 border-bottom-warning text-white">
                                <h5 class="text-center">Lapangan Standar</h5>
                            </div>
                            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">Nota</th>
                                            <th class="text-center">Jam</th>
                                            <th class="text-center">Pendapatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        <?php foreach ($standar as $st) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td class="text-center"><?= $st['nota']; ?></td>
                                                <td class="text-center"><?= $st['jam']; ?></td>
                                                <td class="text-center"><?= "Rp " . number_format($st['total'], 2, ',', '.'); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <th class="text-right">
                                                <div class="btn font-weight-bold">Total</div>
                                            </th>
                                            <td class="text-center">
                                                <div class="btn btn-success font-weight-bold"><?= "Rp " . number_format($pendapatan[0], 2, ',', '.'); ?></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-biru2 border-bottom-warning text-white">
                                <h5 class="text-center">Lapangan Sintetis</h5>
                            </div>
                            <div class="table-responsive-lg">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">Nota</th>
                                            <th class="text-center">Jam</th>
                                            <th class="text-center">Pendapatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        <?php foreach ($sintetis as $s) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td class="text-center"><?= $s['nota']; ?></td>
                                                <td class="text-center"><?= $s['jam']; ?></td>
                                                <td class="text-center"><?= "Rp " . number_format($s['total'], 2, ',', '.'); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">
                                                <div class="btn font-weight-bold">Total</div>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn btn-success font-weight-bold"><?= "Rp " . number_format($pendapatan[1], 2, ',', '.'); ?></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end mt-3">
                    <div class="col-lg-6 p-4">
                        <div class="table-responsive-lg">
                            
                            <table class="table table-borderless text-dark text-right">
                                <tr>
                                    <th>Lapangan Standart</th>
                                    <td><?= "Rp " . number_format($pendapatan[0], 2, ',', '.'); ?></td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>Lapangan Standart</th>
                                    <td><?= "Rp " . number_format($pendapatan[1], 2, ',', '.'); ?></td>
                                </tr>
                                <tr >
                                    <th>Total</th>
                                    <th ><?= "Rp " . number_format($laporan['pendapatan'],2,',','.'); ?></th>
                                </tr>
                            </table>
                        </div>
                        </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row justify-content-center mt-2">
        <a href="<?= base_url('laporan/laporanHarian')?>" class="btn btn-primary mr-1"><i class="fas fa-arrow-left"></i></a>
        <a href="<?= base_url('laporan/pdflaporanHarian/'). $laporan['id']?>" class="btn btn-danger mr-1"><i class="fas fa-file-pdf"></i></a>
        <a href="<?= base_url('laporan/excellaporanHarian/'). $laporan['id']?>" class="btn btn-success mr-1"><i class="fas fa-file-excel"></i></a>
    </div>
</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    Highcharts.chart('pie', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Perbandingan Pemakaian Lapangan',
            align: 'center'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Pemakaian',
            colorByPoint: true,
            data: [{
                    name: '<?= $lapangan[0]; ?>',
                    y: <?= $pemakaian[0]; ?>
                },
                {
                    name: '<?= $lapangan[1]; ?>',
                    y: <?= $pemakaian[1]; ?>
                },
            ]
        }]
    });
</script>