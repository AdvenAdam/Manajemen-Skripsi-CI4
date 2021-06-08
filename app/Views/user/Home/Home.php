<?= $this->extend('user/layout/v_main'); ?>
<?= $this->section('content'); ?>

<?= $this->include('user/Home/Slider'); ?>
<?= $this->include('user/Home/Tentang'); ?>
<?= $this->include('user/Home/Team'); ?>


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