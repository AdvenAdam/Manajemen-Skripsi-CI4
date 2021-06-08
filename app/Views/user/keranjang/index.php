<?= $this->extend('user/layout/v_main'); ?>
<?= $this->section('content'); ?>
<!--====== LATEST NEWS PART START ======-->

<div class="latest-news-area gray-bg mt-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <span>Keranjang</span>
                    <h4 class="title">Daftar Pinjam</h4>
                </div> <!-- sction title -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>
<section class="cart-area pt-50 pb-140">
    <div class="container">
        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success" role="alert">
                <span><?= session()->getFlashdata('success'); ?></span>
            </div>
        <?php } ?>
        <div class="row">
            <div class="cart-table table-responsive pt-0">
                <table class="table" id="example" width="100%">
                    <thead>
                        <tr>
                            <th>Peminjam</th>
                            <th>Judul</th>
                            <th>Pinjam</th>
                            <th>Denda</th>
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
                                <td>
                                    <?php if ($list['tanggal_pinjam'] != null) { ?>
                                        <?= format_indo($list['tanggal_pinjam']); ?>
                                    <?php } else { ?>
                                        <span>-</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($list['denda'] > 0) { ?>
                                        <span style="color: red;"> <?= $list['denda']; ?> </span>
                                    <?php } else { ?>
                                        <span>-</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($list['status'] == 1) { ?>
                                        <span style="color: white;" class="badge rounded-pill bg-primary">Menunggu Acc</span>
                                    <?php } else if ($list['status'] == 2) { ?>
                                        <span style="color: white;" class="badge rounded-pill bg-warning">Dipinjam</span>
                                    <?php } else if ($list['status'] == 3) { ?>
                                        <span style="color: white;" class="badge rounded-pill bg-danger">Dikembalikan</span>
                                    <?php } else if ($list['status'] == 4) { ?>
                                        <span style="color: white;" class="badge rounded-pill bg-success">Selesai</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($list['status'] == 2) { ?>
                                        <form action="/Transaksi/Kembali/<?= $list['id_trx']; ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <button class="btn btn-danger">Kembalikan</button>
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
</section>


<!--====== LATEST NEWS PART ENDS ======-->
<?= $this->endSection(); ?>