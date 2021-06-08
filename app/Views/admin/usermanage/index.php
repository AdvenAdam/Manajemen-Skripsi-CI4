<?= $this->extend('/admin/layout/main'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="Card-title mb-4">Data User Tersimpan</h3>
                        <div class="row mb-4">
                            <div class="col-6">
                                <a href="Dokumen/create" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="col-6" align="right">
                                <a href="" class="btn btn-success"> <i class="fas fa-file-excel"></i> button 1</a>
                                <a href="" class="btn btn-danger"> <i class="fas fa-file-pdf"></i> button 2</a>
                            </div>
                        </div>
                        <table id="example" class="display table-hover table invoice-table" style=" width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>
                                <?php foreach ($users as $list) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $list->username; ?></td>
                                        <td><?= $list->email; ?></td>
                                        <td>
                                            <?php if ($list->active == 1) { ?>
                                                <span class="badge rounded-pill bg-success">Aktif</span>
                                            <?php } else { ?>
                                                <span class="badge rounded-pill bg-danger">Tidak Aktif</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($list->name == 'admin') { ?>
                                                <span class="badge rounded-pill bg-secondary">admin</span>
                                            <?php } else { ?>
                                                <span class="badge rounded-pill bg-dark">member</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($list->name == 'admin') { ?>
                                                <form action="/Admin/UserManage/LevelDown/<?= $list->userid; ?>" method="POST" class="d-inline">
                                                    <?php csrf_field() ?>
                                                    <button type="submit" class="btn btn-danger">Turunkan level</button>
                                                </form>
                                            <?php } else { ?>
                                                <form action="/Admin/UserManage/LevelUp/<?= $list->userid; ?>" method="POST" class="d-inline">
                                                    <?php csrf_field() ?>
                                                    <button type="submit" class="btn btn-success">Naikan Level </button>
                                                </form>
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
<?= $this->endSection(); ?>