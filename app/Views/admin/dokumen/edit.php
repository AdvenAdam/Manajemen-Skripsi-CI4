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

                                <form action="/Admin/Dokumen/update/<?= $dokumen['id']; ?>" method="Post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>

                                    <div class="form-floating mb-4">
                                        <input type="text" value="<?= old('penulis') ? old('penulis') : $dokumen['penulis']  ?>" name="penulis" class="form-control <?= $validation->hasError('penulis') ? 'is-invalid' : '' ?>" placeholder="penulis">
                                        <label for="penulis">Penulis</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('penulis'); ?>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" name="tahun" value="<?= old('tahun') ? old('tahun') : $dokumen['tahun']; ?>" class="form-control <?= $validation->hasError('tahun') ? 'is-invalid' : '' ?>" id="tahun" placeholder="Tahun">
                                        <label for="tahun">Tahun</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tahun'); ?>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" value="<?= old('pembimbing') ? old('pembimbing') : $dokumen['pembimbing']; ?>" name="pembimbing" class="form-control <?= $validation->hasError('pembimbing') ? 'is-invalid' : '' ?>" id="pembimbing" placeholder="Pembimbing">
                                        <label for="pembimbing">Pembimbing</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pembimbing'); ?>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" name="judul" value="<?= old('judul') ? old('judul') : $dokumen['judul']; ?>" class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : '' ?>" id="judul" placeholder="Judul">
                                        <label for="judul">Judul</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('judul'); ?>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <select class="form-select <?= $validation->hasError('bidang') ? 'is-invalid' : '' ?>" name="bidang">
                                            <option value="<?= $dokumen['id_bidang']; ?>"><?= $dokumen['bidang']; ?></option>
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
                                            <option value="<?= $dokumen['id_jenis_penelitian']; ?>"><?= $dokumen['jenis_penelitian']; ?></option>
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
                                            <option value="<?= $dokumen['id_kategori_dokumen']; ?>"><?= $dokumen['kategori_dokumen']; ?></option>
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
                                        <textarea name="pendahuluan" class=" form-control <?= $validation->hasError('pendahuluan') ? 'is-invalid' : '' ?>" id="pendahuluan"><?= old('pendahuluan') ? old('pendahuluan') : $dokumen['pendahuluan']; ?>
                                     </textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pendahuluan'); ?>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="dokumen" class="form-label d-inline"><?= $dokumen['dokumen']; ?>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#view">> <i data-feather="eye"></i></a>
                                        </label>
                                        <input id="dokumen" class="form-control form-control-sm <?= $validation->hasError('dokumen') ? 'is-invalid' : '' ?>" name="dokumen" type="file">
                                        <canvas id="pdfViewer" height="0%"></canvas>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('dokumen'); ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirm">Simpan</a>
                                        </div>
                                        <div class="col-6" align="right">
                                            <a href="/Admin/Dokumen" class="btn btn-success">Kembali</a>
                                        </div>
                                    </div>
                                    <!-- Modal confirm-->
                                    <div class="modal fade" id="confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Pastikan Anda Yakin</h5>
                                                    <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda Yakin Untuk Menyimpan Perubahan ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                    <a class="btn btn-secondary" data-bs-dismiss="modal">Tutup</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal View PDF -->
                        <div class="modal fade" id="view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel"><?= $dokumen['dokumen']; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <embed type="application/pdf" src="/dokumen/<?= $dokumen['kategori_dokumen']; ?>/<?= $dokumen['dokumen']; ?>" width="100%" height="750"></embed>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>