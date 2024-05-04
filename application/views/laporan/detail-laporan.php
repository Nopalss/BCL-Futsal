<div class="container-fluid mb-5">
    <div class="d-flex justify-content-center">
        <div class="card col-lg rounded p-0">
            <div class="card-header col-lg bg-biru2 border-bottom-warning text-white">
                <h3 class="text-center"><i class="fas fa-futbol text-gold"></i> BCL Futsal</h3>
            </div>
            <div class="card-body bg-gray-200">
                <table class="table-responsive">
                    <tr>
                        <td>
                            <h5 class="text-dark font-weight-bold mr-2">No. Laporan </h5>
                        </td>
                        <td>
                            <h5 class="text-dark font-weight-bold mr-2"> = </h5>
                        </td>
                        <td>
                            <h5 class=" font-weight-bold btn btn-info"><?= $laporan['id']; ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-dark font-weight-bold">Tanggal </h5>
                        </td>
                        <td>
                            <h5 class="text-dark font-weight-bold">= </h5>
                        </td>
                        <td>
                            <h5 class="text-dark font-weight-bold"><?= $laporan['tanggal']; ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-success font-weight-bold">Pendapatan </h5>
                        </td>
                        <td>
                            <h5 class="text-dark font-weight-bold">= </h5>
                        </td>
                        <td>
                            <h5 class="text-success font-weight-bold">Rp <?= $laporan['pendapatan']; ?></h5>
                        </td>
                    </tr>
                </table>
                <div class="table-responsive">
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class=" pt-4 ">
                            <div id="pie"></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md mb-4">
                        <div class="card border-0 shadow-sm">
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
                                                <td class="text-center"><?= "Rp " . number_format($st['total'],2,',','.') ; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <th class="text-right"> <div class="btn font-weight-bold">Total</div></th>
                                            <td class="text-center"><div class="btn btn-success font-weight-bold"><?= "Rp " . number_format($pendapatan[0],2,',','.'); ?></div></td>
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
                                                <td class="text-center"><?= "Rp " . number_format($s['total'],2,',','.') ; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"> <div class="btn font-weight-bold">Total</div></td>
                                            <td class="text-center"><div class="btn btn-success font-weight-bold"><?= "Rp " . number_format($pendapatan[1],2,',','.'); ?></div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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