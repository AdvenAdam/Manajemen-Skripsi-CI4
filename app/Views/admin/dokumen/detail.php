<?= $this->extend('admin/layout/main'); ?>
<?= $this->Section('content'); ?>
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h2>Detail Dokumen</h2>
                            </div>
                            <div class="col-4">
                                <h4 class="float-end"># <?= $dokumen['id']; ?></h4>
                            </div>
                        </div>
                        <div class="invoice-details">
                            <div class="row">
                                <div class="col">
                                    <p class="info">Judul:</p>
                                    <p><?= $dokumen['judul']; ?>, <?= $dokumen['tahun']; ?></p>
                                </div>
                                <div class="col">
                                    <p class="info">Penulis:</p>
                                    <p><?= $dokumen['penulis']; ?></p>
                                </div>
                                <div class="col">
                                    <p class="info">Pembimbing:</p>
                                    <p><?= $dokumen['pembimbing']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="info">Kategori:</p>
                                    <p><?= $dokumen['kategori_dokumen']; ?></p>
                                </div>
                                <div class="col">
                                    <p class="info">Penelitian:</p>
                                    <p><?= $dokumen['jenis_penelitian']; ?></p>
                                </div>
                                <div class="col">
                                    <p class="info">Jurusan:</p>
                                    <p><?= $dokumen['bidang']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="info">Diupload pada:</p>
                                    <p><?= $dokumen['created_at']; ?></p>
                                </div>
                                <div class="col">
                                    <p class="info">Status:</p>
                                    <p><?= $dokumen['status_peminjaman']; ?></p>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                            </div>
                        </div>
                        <div class="row invoice-last">
                            <h2>Pendahuluan</h2>
                            <div class="col-12">
                                <?= $dokumen['pendahuluan']; ?>
                            </div>
                        </div>
                        <div class="row invoice-details">
                            <h2>Pdf</h2>
                            <div class="col-12">
                                <embed type="application/pdf" src="/dokumen/<?= $dokumen['kategori_dokumen']; ?>/<?= $dokumen['dokumen']; ?>" width="90%" height="750"></embed>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>