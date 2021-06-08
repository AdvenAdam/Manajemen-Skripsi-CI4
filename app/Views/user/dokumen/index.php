<?= $this->extend('user/layout/v_main'); ?>
<?= $this->section('content'); ?>
<!--====== LATEST NEWS PART START ======-->

<div class="latest-news-area gray-bg mt-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <span>Nama Instansi</span>
                    <h4 class="title">Data Judul Karya Ilmiah</h4>
                </div> <!-- sction title -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>
<section class="cart-area pt-50 pb-140">
    <div class="container">
        <?php if (session()->getFlashdata('danger')) { ?>
            <div class="alert alert-danger" role="alert">
                <span><?= session()->getFlashdata('danger'); ?></span>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-tab mt-80 d-flex justify-content-center">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-skripsi-tab" data-toggle="pill" href="#pills-skripsi" role="tab" aria-controls="pills-skripsi" aria-selected="true">Skripsi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-PI-tab" data-toggle="pill" href="#pills-PI" role="tab" aria-controls="pills-PI" aria-selected="false">Praktik Industri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-PPL-tab" data-toggle="pill" href="#pills-PPL" role="tab" aria-controls="pills-PPL" aria-selected="false">PPL</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-skripsi" role="tabpanel" aria-labelledby="pills-skripsi-tab">
                        <div class="cart-table table-responsive pt-50">
                            <table class="table" id="example" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Tahun</th>
                                        <th>Kategori </th>
                                        <th>Diunggah</th>
                                        <th>Lihat</th>
                                        <th>Pinjam</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <tbody>
                                    <?php foreach ($kategori1 as $list) { ?>
                                        <tr>
                                            <td>
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $list['judul']; ?></td>
                                            <td><?= $list['tahun']; ?></td>
                                            <td><?= $list['kategori_dokumen']; ?></td>
                                            <td><?= $list['created_at']; ?></td>
                                            <td>
                                                <a href="detailDokumen/<?= $list['id']; ?>" class="btn btn-primary">Lihat</a>
                                            </td>
                                            <td>
                                                <?php if ($list['status_peminjaman'] == 'tersedia') { ?>
                                                    <form action="/Transaksi/Pinjam/<?= $list['id']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <button class="btn btn-success">Pinjam</button>
                                                    </form>
                                                <?php } else { ?>
                                                    <span style="color:white;" class="badge rounded-pill bg-danger">Tidak Tersedia</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-PI" role="tabpanel" aria-labelledby="pills-PI-tab">
                        <div class="cart-table table-responsive pt-50">
                            <table class="table" id="example" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Tahun</th>
                                        <th>Kategori </th>
                                        <th>Diunggah</th>
                                        <th>Lihat</th>
                                        <th>Pinjam</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <tbody>
                                    <?php foreach ($kategori2 as $list) { ?>
                                        <tr>
                                            <td>
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $list['judul']; ?></td>
                                            <td><?= $list['tahun']; ?></td>
                                            <td><?= $list['kategori_dokumen']; ?></td>
                                            <td><?= $list['created_at']; ?></td>
                                            <td>
                                                <a href="detailDokumen/<?= $list['id']; ?>" class="btn btn-primary">Lihat</a>
                                            </td>
                                            <td>
                                                <?php if ($list['status_peminjaman'] == 'tersedia') { ?>
                                                    <form action="/Transaksi/Pinjam/<?= $list['id']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <button class="btn btn-success">Pinjam</button>
                                                    </form>
                                                <?php } else { ?>
                                                    <span style="color:white;" class="badge rounded-pill bg-danger">Tidak Tersedia</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-PPL" role="tabpanel" aria-labelledby="pills-PPL-tab">
                        <div class="cart-table table-responsive pt-50">
                            <table class="table" id="example" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Tahun</th>
                                        <th>Kategori </th>
                                        <th>Diunggah</th>
                                        <th>Lihat</th>
                                        <th>Pinjam</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <tbody>
                                    <?php foreach ($kategori3 as $list) { ?>
                                        <tr>
                                            <td>
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $list['judul']; ?></td>
                                            <td><?= $list['tahun']; ?></td>
                                            <td><?= $list['kategori_dokumen']; ?></td>
                                            <td><?= $list['created_at']; ?></td>
                                            <td>
                                                <a href="detailDokumen/<?= $list['id']; ?>" class="btn btn-primary">Lihat</a>
                                            </td>
                                            <td>
                                                <?php if ($list['status_peminjaman'] == 'tersedia') { ?>
                                                    <form action="/Transaksi/Pinjam/<?= $list['id']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <button class="btn btn-success">Pinjam</button>
                                                    </form>
                                                <?php } else { ?>
                                                    <span style="color:white;" class="badge rounded-pill bg-danger">Tidak Tersedia</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--====== LATEST NEWS PART ENDS ======-->
<?= $this->endSection(); ?>