<div class="container-fluid">
    <div class="col-lg">
        <div class="row">
            <div class="col-lg-8 mr-3  bg-white mb-3 rounded  shadow-lg d-flex justify-content-between table-responsive">
                <div class="d-flex flex-column pt-2 font-weight-bold ">
                    <p class="h4 text-dark mb-5 font-weight-bold">Pendapatan</p>
                    <h3 class="h1 font-weight-bold text-dark d-flex"><i class="fas fa-chevron-circle-up text-success mr-1"></i> <?= " Rp" . number_format($total['total'], 2, ',', '.'); ?></h3>
                </div>
                <div class="d-flex justify-content-center align-items-center h1 p-2 ">
                    <i class="fas fa-money-bill-wave text-warning d-none d-md-block d-xl-block"></i>
                </div>
            </div>
            <div class="col mr-3 mb-3 ">
                <div class="row p-0">
                    <div class="col-lg-12 bg-biru2 mb-3 rounded d-flex justify-content-between shadow-lg">
                        <div class="d-flex flex-column pt-2 font-weight-bold ">
                            <p class="text-warning">Booking</p>
                            <h3 class="h3 font-weight-bold text-white"><?= $booking['total']; ?></h3>
                        </div>
                        <div class="d-flex justify-content-center align-items-center text-white ">
                            <a href="<?= base_url('booking') ?>"><i class="fas fa-angle-left fa-flip-horizontal p-2 bg-gray-600 rounded text-white"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-12 bg-biru2 rounded d-flex justify-content-between shadow-lg">
                        <div class="d-flex flex-column pt-2 font-weight-bold">
                            <p class="text-warning">Transaksi</p>
                            <h3 class="h3 font-weight-bold text-white"><?= $transaksi['total']; ?></h3>
                        </div>
                        <div class="d-flex justify-content-center align-items-center text-white ">
                            <a href="<?= base_url('transaksi') ?>"><i class="fas fa-angle-left fa-flip-horizontal p-2 bg-gray-600 rounded text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg mt-2 mb-5 p-0">
        <div class="row">
            <div class="col-xl-3">
            <div class="card shadow-lg">
                    <div class=" pt-4 ">
                        <div id="pie"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 mt-2">
                <div class="card shadow-lg">
                    <div class=" pt-4 ">
                        <div id="line"></div>
                    </div>
                </div>
            </div>
        </div>
        <p class="d-none">
            p
        </p>
    </div>
</div>




<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    Highcharts.chart('line', {

        title: {
            text: 'Grafik Pendapatan <?= $tahun ?>',
            align: 'center'
        },



        yAxis: {
            title: {
                text: 'Total Pendapatan'
            }
        },

        xAxis: {
            accessibility: {
                rangeDescription: 'Range: 1 to 12'
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 1
            }
        },

        series: [{
            name: 'Pendapatan',
            // data: [100, 200]
            data: [<?php foreach ($pendapatan as $p) { ?> <?= $p['pendapatan'] . ","; ?> <?php }; ?>]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
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