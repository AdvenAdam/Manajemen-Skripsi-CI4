<?= $this->extend('/admin/layout/main'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="Card-title mb-4">Data Transaksi Tersimpan</h3>
                        <div class="row mb-4">
                            <div class="col-4">
                            </div>
                            <div class="col-8" align="right">
                                <a href="Transaksi/lapExcel" class="btn btn-success"> <i class="fas fa-file-excel"></i> Cetak Laporan</a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#confirmHapus" class="btn btn-danger">Hapus Transaksi yang Sudah Selesai</a>
                            </div>
                        </div>
                        <table id="example" class="display table-hover table invoice-table" style=" width:100%">
                            <thead>
                                <tr>
                                    <th>Peminjam</th>
                                    <th>Judul</th>
                                    <th>Pinjam</th>
                                    <th>Kembali</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>
                                <?php foreach ($transaksi as $list) { ?>
                                    <tr>
                                        <td><?= $list['username']; ?></td>
                                        <td><?= $list['judul']; ?></td>
                                        <td><?= $list['tanggal_pinjam']; ?></td>
                                        <td><?= $list['tanggal_kembali']; ?></td>
                                        <td>
                                            <?php if ($list['status'] == 1) { ?>
                                                <span class="badge rounded-pill bg-danger">Menunggu Acc</span>
                                            <?php } else if ($list['status'] == 2) { ?>
                                                <span class="badge rounded-pill bg-warning">Dipinjam</span>
                                            <?php } else if ($list['status'] == 3) { ?>
                                                <span class="badge rounded-pill bg-danger">Dikembalikan</span>
                                            <?php } else if ($list['status'] == 4) { ?>
                                                <span class="badge rounded-pill bg-success">Selesai</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($list['status'] == 1) { ?>
                                                <form action="/Admin/Transaksi/Acc/<?= $list['id_trx']; ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <button class="btn btn-primary">Acc</button>
                                                </form>
                                            <?php } elseif ($list['status'] == 3) { ?>
                                                <form action="/Admin/Transaksi/Terima/<?= $list['id_trx']; ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <button class="btn btn-secondary">Terima</button>
                                                </form>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <!-- Modal confirm-->
                                    <div class="modal fade" id="confirmHapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Pastikan Anda Yakin ??</h5>
                                                    <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda Yakin Untuk Menghapus Data ?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="/Admin/Transaksi/DeleteBatch" method="POST">
                                                        <?= csrf_field(); ?>
                                                        <button class="btn btn-danger">Ya, Saya Mengerti</button>
                                                    </form>
                                                    <a class="btn btn-secondary" data-bs-dismiss="modal">Tutup</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>