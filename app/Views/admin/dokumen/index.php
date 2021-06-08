<?= $this->extend('/admin/layout/main'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="Card-title mb-4">Data Dokumen Tersimpan</h3>
                        <div class="row mb-4">
                            <div class="col-6">
                                <a href="Dokumen/create" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="col-6" align="right">
                                <a href="Dokumen/lapExcel" class="btn btn-success"> <i class="fas fa-file-excel"></i> Cetak Laporan</a>
                            </div>
                            <div class="col">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <div class="row">
                                                <div class="col">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                        <a href="" class="btn btn-warning">Filter</a>
                                                    </button>
                                                </div>
                                            </div>

                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <form class="row row-cols-lg-auto align-items-center" action="/Admin/Dokumen" method="POST">
                                                    <input type="hidden" name="" id="">
                                                    <div class="col-5">
                                                        <label>Pilih Jenis Penelitian</label>
                                                        <select class="form-select" name="jenis_penelitian">
                                                            <option value="">Pilih</option>
                                                            <?php foreach ($jenis as $list) { ?>
                                                                <option value="<?= $list['id_jenis_penelitian']; ?>"><?= $list['jenis_penelitian']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-5">
                                                        <label>Pilih Kategori Dokumen</label>
                                                        <select class="form-select" name="kategori_dokumen">
                                                            <option value="">Pilih</option>
                                                            <?php foreach ($kategori as $list) { ?>
                                                                <option value="<?= $list['id_kategori_dokumen']; ?>"><?= $list['kategori_dokumen']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-4 pt-4">
                                                        <button type="submit" class="btn btn-success">Cari Filter</button>
                                                        <a href="/Admin/Dokumen" class="btn btn-danger">Reset Filter</a>
                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table id="example" class="display table-hover table invoice-table" style=" width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Kategori</th>
                                    <th>Penelitian</th>
                                    <th>Bidang</th>
                                    <th>#</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>
                                <?php foreach ($dokumen as $list) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $list['judul']; ?></td>
                                        <td><?= $list['penulis']; ?></td>
                                        <td><?= $list['kategori_dokumen']; ?></td>
                                        <td><?= $list['jenis_penelitian']; ?></td>
                                        <td><?= $list['bidang']; ?></td>
                                        <td>
                                            <form action="/Transaksi/Pinjam/<?= $list['id']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <button class="btn btn-success">Pinjam</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="Dokumen/edit/<?= $list['id']; ?>" title="Edit"><i data-feather="edit"></i> </a>
                                            <a href="Dokumen/detail/<?= $list['id']; ?>" title="Lihat"><i data-feather="eye"></i> </a>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#confirm" title="Hapus Data"><i data-feather="delete"></i> </a>
                                        </td>
                                    </tr>
                                    <!-- Modal confirm-->
                                    <div class="modal fade" id="confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                    <a href="Dokumen/delete/<?= $list['id']; ?>" class="btn btn-danger">Ya, Saya Mengerti</a>
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
<!-- <?= $this->section('source'); ?>

<?= $this->endSection(); ?> -->