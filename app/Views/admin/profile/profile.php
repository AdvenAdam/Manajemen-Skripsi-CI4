<?= $this->extend('admin/layout/main'); ?>
<?= $this->Section('content'); ?>
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body pl-6 pb-6">
                        <h5 class="card-title">Form Edit Profile</h5>
                        <?php if (session()->getFlashdata('danger')) { ?>
                            <div class="alert alert-danger fade show" role="alert">
                                <span><?= session()->getFlashdata('danger'); ?></span>
                            </div>
                        <?php } ?>
                        <?php if (session()->getFlashdata('success')) { ?>
                            <div class="alert alert-success fade show" role="alert">
                                <span><?= session()->getFlashdata('success'); ?></span>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-12">
                                <?php foreach ($user as $list) { ?>
                                    <form action="/Admin/Profile/update/<?= $list['userid']; ?>" method="Post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>

                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?= old('username') ? old('username') : $list['username']; ?>" name="username" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" placeholder="username">
                                            <label for="username">Username</label>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('username'); ?>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" value="<?= old('email') ? old('email') : $list['email']; ?>" name="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" placeholder="email">
                                            <label for="email">Email</label>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <div class="col-3" style="margin: 0px auto;">
                                                    <img class="img-thumbnail img-preview" src="/image/foto/<?= $list['user_image']; ?>">
                                                </div>
                                            </div>
                                            <label for="foto" class="form-label"><?= $list['user_image']; ?></label>
                                            <input type="file" id="foto" name=" user_image" onchange="previewImg()" class="custom-file-input foto form-control <?= $validation->hasError('foto') ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('user_image'); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <button class="btn btn-primary" type="Submit">Simpan</button>
                                            </div>
                                            <div class="col-6" align="right">
                                                <a href="/" class="btn btn-secondary">Kembali</a>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>