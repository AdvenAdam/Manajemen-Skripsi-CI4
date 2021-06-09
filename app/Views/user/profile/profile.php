<?= $this->extend('user/layout/v_main'); ?>
<?= $this->section('content'); ?>

<div class="latest-news-area gray-bg mt-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <span>Prodi Pendidikan Teknik Informatika dan Komputer</span>
                    <h4 class="title">Profile</h4>
                </div> <!-- sction title -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>
<div class="team-details-area pt-120 pb-120">
    <div class="container">
        <?php foreach ($user as $value) { ?>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="team-details-thumb">
                        <img src="image/foto/<?= $value['user_image']; ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="team-details-content">
                        <h4 class="title"><?= $value['username']; ?></h4>
                        <span><?= $value['name']; ?></span><br>
                        <form action="Profile/update/<?= $value['userid']; ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6>Username</h6>
                                    <input type="text" value="<?= old('username') ? old('username') : $value['username']; ?>" name="username" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>">
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6>Email</h6>
                                    <input type="email" value="<?= old('email') ? old('email') : $value['email']; ?>" name="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>">
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="row mb-4">
                                    <div class="col-3" style="margin: 0px auto;">
                                        <img class="img-thumbnail img-preview" src="/image/foto/<?= $value['user_image']; ?>">
                                    </div>
                                </div>
                                <div class="custom-file">
                                    <input type="file" id="foto" name="user_image" onchange="previewImg()" class="custom-file-input foto form-control <?= $validation->hasError('foto') ? 'is-invalid' : '' ?>"">
                                    <label class=" custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('user_image'); ?>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <button class="main-btn wow slideInUp" data-wow-duration="1.5s" data-wow-delay="0s" type="submit">Ubah Data <i class="fal fa-long-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?= $this->endSection(); ?>