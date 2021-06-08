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
                                <h4 class="float-end"># <?php if ($users->active == 1) { ?>
                                        <span class="badge rounded-pill bg-success">Aktif</span>
                                    <?php } else { ?>
                                        <span class="badge rounded-pill bg-danger">Tidak Aktif</span>
                                    <?php } ?>
                                </h4>
                            </div>
                        </div>
                        <div class="invoice-details">
                            <div class="row">
                                <div class="col">
                                    <p class="info">Username:</p>
                                    <p><?= $users->username; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="info">Email:</p>
                                    <p><?= $users->email; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="info">Level:</p>
                                    <p><?= $users->name; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row invoice-details">
                            <h2>Image</h2>
                            <div class="col-12">
                                <img src="/image/foto/<?= $users->user_image; ?>" alt="">
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
<script>

</script>
<?= $this->endSection(); ?>