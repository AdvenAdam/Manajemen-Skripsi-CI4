<?= $this->extend('/admin/layout/main'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card stat-widget">
                    <div class="card-body">
                        <h5 class="card-title">Pengguna</h5>
                        <i class="fas fa-user fa-7x"></i>
                        <h2>132</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card stat-widget">
                    <div class="card-body">
                        <h5 class="card-title">Dokumen</h5>
                        <h2><?= $jml_dokumen; ?></h2>
                        <i class="fas fa-file-alt fa-7x"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card stat-widget">
                    <div class="card-body">
                        <h4 class="card-title">Dipinjam</h4>
                        <h2><?= $jml_trx; ?></h2>
                        <i class="fas fa-file-import fa-7x"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card stat-widget">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat Transaksi</h5>
                        <h2><?= $riwayat_trx; ?></h2>
                        <i class="fas fa-dolly fa-7x"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- //pengunjung -->
            <div class="col-md-12 col-lg-6">
                <div class="card table-widget pb-5">
                    <div class="card-body">
                        <h5 class="card-title">Pengunjung </h5>
                        <div class="row">
                            <div class="col" style="margin-left: 30px;">
                                <div class="btn-group" role="group">
                                    <form action="/Admin" method="post">
                                        <input type="hidden" name="jenis" value="Tahunan">
                                        <button class="btn btn-outline-primary">Tahunan</button>
                                    </form>
                                    <form action="/Admin" method="post">
                                        <input type="hidden" name="jenis" value="Bulanan">
                                        <button class="btn btn-outline-primary">Bulanan</button>
                                    </form>
                                    <form action="/Admin" method="post">
                                        <input type="hidden" name="jenis" value="Harian">
                                        <button class="btn btn-outline-primary">Harian</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="apex2"></div>
                    </div>
                </div>
            </div>
            <!-- transaksi -->
            <div class="col-md-12 col-lg-6">
                <div class="card table-widget pb-5">
                    <div class="card-body">
                        <h5 class="card-title">Transaksi Peminjaman </h5>
                        <div class="row">
                            <div class="col" style="margin-left: 30px;">
                                <div class="btn-group" role="group">
                                    <form action="/Admin" method="post">
                                        <input type="hidden" name="jenis_trx" value="Tahunan">
                                        <button class="btn btn-outline-primary">Tahunan</button>
                                    </form>
                                    <form action="/Admin" method="post">
                                        <input type="hidden" name="jenis_trx" value="Bulanan">
                                        <button class="btn btn-outline-primary">Bulanan</button>
                                    </form>
                                    <form action="/Admin" method="post">
                                        <input type="hidden" name="jenis_trx" value="Harian">
                                        <button class="btn btn-outline-primary">Harian</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="transaksi"></div>
                    </div>
                </div>
            </div>
        </div>
        <h2>Detail Data Dokumen</h2>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card table-widget pb-5">
                    <div class="card-body">
                        <h5 class="card-title">Kategori Dokumen</h5>
                        <canvas id="kategori">Your browser does not support the canvas element.</canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card table-widget pb-5">
                    <div class="card-body">
                        <h5 class="card-title">Bidang Keahlian</h5>
                        <canvas id="bidang">Your browser does not support the canvas element.</canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card table-widget pb-5">
                    <div class="card-body">
                        <h5 class="card-title">Jenis Penelitian</h5>
                        <canvas id="jenis">Your browser does not support the canvas element.</canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('source'); ?>
<?php
$dataKategori = array_column($kategori, 'kategori');
$jumlahKategori = array_column($kategori, 'jumlah');

$dataBidang = array_column($bidang, 'bidang');
$jumlahBidang = array_column($bidang, 'jumlah');

$dataJenis = array_column($jenis, 'jenis');
$jumlahJenis = array_column($jenis, 'jumlah');

$dataPengunjung = array_column($pengunjung, 'jml_pengunjung');
$dataHari       = array_column($pengunjung, 'created_at');

$dataTrx = array_column($transaksi, 'jml_trx');
$dataPeriod       = array_column($transaksi, 'created_at');

?>
<script>
    $(document).ready(function() {

        "use strict";

        new Chart(document.getElementById("kategori"), {
            "type": "doughnut",
            "data": {
                "labels": <?= json_encode($dataKategori); ?>,
                "datasets": [{
                    "label": "My First Dataset",
                    "data": <?= json_encode($jumlahKategori); ?>,
                    "backgroundColor": ["#8a75d5", "#00f7ff", "#00ff81"]
                }]
            }
        });
        new Chart(document.getElementById("bidang"), {
            "type": "doughnut",
            "data": {
                "labels": <?= json_encode($dataBidang); ?>,
                "datasets": [{
                    "label": "My First Dataset",
                    "data": <?= json_encode($jumlahBidang); ?>,
                    "backgroundColor": ["#8a75d5", "#00f7ff", "#00ff81"]
                }]
            }
        });
        new Chart(document.getElementById("jenis"), {
            "type": "doughnut",
            "data": {
                "labels": <?= json_encode($dataJenis); ?>,
                "datasets": [{
                    "label": "My First Dataset",
                    "data": <?= json_encode($jumlahJenis); ?>,
                    "backgroundColor": ["#8a75d5", "#00f7ff", "#00ff81", "#cd32c2", "#FFF550"]
                }]
            }
        });

        var options2 = {
            chart: {
                height: 350,
                type: 'area',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                name: 'Pengunjung',
                data: <?= json_encode($dataPengunjung); ?>
            }],

            xaxis: {
                type: 'date',
                categories: <?= json_encode($dataHari); ?>,
                labels: {
                    style: {
                        colors: 'rgba(94, 96, 110, .5)'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
            grid: {
                borderColor: 'rgba(94, 96, 110, .5)',
                strokeDashArray: 4
            }
        }

        var chart2 = new ApexCharts(
            document.querySelector("#apex2"),
            options2
        );

        chart2.render();

        var trx = {
            chart: {
                height: 350,
                type: 'area',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                name: 'Transaksi',
                data: <?= json_encode($dataTrx); ?>
            }],

            xaxis: {
                type: 'date',
                categories: <?= json_encode($dataPeriod); ?>,
                labels: {
                    style: {
                        colors: 'rgba(94, 96, 110, .5)'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
            grid: {
                borderColor: 'rgba(94, 96, 110, .5)',
                strokeDashArray: 4
            }
        }

        var trxchart = new ApexCharts(
            document.querySelector("#transaksi"),
            trx
        );

        trxchart.render();
    });
</script>

<?= $this->endSection(); ?>