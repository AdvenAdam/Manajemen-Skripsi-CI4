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
                        <h2>7.4K</h2>
                        <i class="fas fa-file-import fa-7x"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card stat-widget">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat Transaksi</h5>
                        <h2>87</h2>
                        <i class="fas fa-dolly fa-7x"></i>
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

    });
</script>

<?= $this->endSection(); ?>