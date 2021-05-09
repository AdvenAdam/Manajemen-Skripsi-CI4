<?= $this->extend('admin/layout/main'); ?>
<?= $this->Section('content'); ?>
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body pl-6 pb-6">
                        <h5 class="card-title">Form Input Dokumen</h5>
                        <div class="row">
                            <div class="col-12">

                                <form action="/Admin/Dokumen/save" method="Post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>

                                    <div class="form-floating mb-4">
                                        <input type="text" value="<?= old('penulis'); ?>" name="penulis" class="form-control <?= $validation->hasError('penulis') ? 'is-invalid' : '' ?>" placeholder="penulis">
                                        <label for="penulis">Penulis</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('penulis'); ?>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" name="tahun" value="<?= old('tahun'); ?>" class="form-control <?= $validation->hasError('tahun') ? 'is-invalid' : '' ?>" id="tahun" placeholder="Tahun">
                                        <label for="tahun">Tahun</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tahun'); ?>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" value="<?= old('pembimbing'); ?>" name="pembimbing" class="form-control <?= $validation->hasError('pembimbing') ? 'is-invalid' : '' ?>" id="pembimbing" placeholder="Pembimbing">
                                        <label for="pembimbing">Pembimbing</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pembimbing'); ?>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" name="judul" value="<?= old('judul'); ?>" class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : '' ?>" id="judul" placeholder="Judul">
                                        <label for="judul">Judul</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('judul'); ?>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <select class="form-select <?= $validation->hasError('bidang') ? 'is-invalid' : '' ?>" name="bidang">
                                            <option value="">Buka Pilihan Menu</option>
                                            <?php foreach ($bidang as $list) { ?>
                                                <?php if ($list['id_bidang'] == old('bidang')) { ?>
                                                    <option value="<?= $list['id_bidang'] ?>" selected><?= $list['bidang']; ?></option>
                                                <?php continue;
                                                } ?>
                                                <option value="<?= $list['id_bidang']; ?>"><?= $list['bidang']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label>Pilih Bidang Jurusan</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('bidang'); ?>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <select class="form-select <?= $validation->hasError('jenis_penelitian') ? 'is-invalid' : '' ?>" name="jenis_penelitian">
                                            <option value="">Buka Pilihan Menu</option>
                                            <?php foreach ($jenis as $list) { ?>
                                                <?php if ($list['id_jenis_penelitian'] == old('jenis_penelitian')) { ?>
                                                    <option value="<?= $list['id_jenis_penelitian'] ?>" selected><?= $list['jenis_penelitian']; ?></option>
                                                <?php continue;
                                                } ?>
                                                <option value="<?= $list['id_jenis_penelitian']; ?>"><?= $list['jenis_penelitian']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label>Pilih Jenis Penelitian</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_penelitian'); ?>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <select class="form-select <?= $validation->hasError('kategori_dokumen') ? 'is-invalid' : '' ?>" id="kategori_dokumen" name="kategori_dokumen" value="">
                                            <option value="<?= old('kategori_dokumen'); ?>">Buka Pilihan Menu</option>
                                            <?php foreach ($kategori as $list) { ?>
                                                <?php if ($list['id_kategori_dokumen'] == old('kategori_dokumen')) { ?>
                                                    <option value="<?= $list['id_kategori_dokumen'] ?>" selected><?= $list['kategori_dokumen']; ?></option>
                                                <?php continue;
                                                } ?>
                                                <option value="<?= $list['id_kategori_dokumen']; ?>"><?= $list['kategori_dokumen']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label>Pilih Kategori Dokumen</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kategori_dokumen'); ?>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="pendahuluan" class=" col-sm-2 form-label">Pendahuluan</label>
                                        <textarea name="pendahuluan" class=" form-control <?= $validation->hasError('pendahuluan') ? 'is-invalid' : '' ?>" id="pendahuluan"><?= old('pendahuluan'); ?>
                                     </textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pendahuluan'); ?>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="dokumen" class="form-label">Silahkan Pilih Dokumen</label>
                                        <input class="form-control form-control-sm <?= $validation->hasError('dokumen') ? 'is-invalid' : '' ?>" id="dokumen" name="dokumen" type="file" required>
                                        <canvas id="pdfViewer" height="20%"></canvas>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('dokumen'); ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        <div class="col-6" align="right">
                                            <a href="/Admin/Dokumen" class="btn btn-success">Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->Section('source'); ?>
<!-- tinymce -->
<script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/tinymce/tinymce.min.js"></script>
<!-- tinymce WYSWYG -->

<script>
    tinymce.init({
        selector: '#pendahuluan',

    });
</script>
<?= $this->endSection(); ?>