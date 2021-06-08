<div class="page-sidebar">
    <ul class="list-unstyled accordion-menu">
        <li class="sidebar-title">
            Main
        </li>
        <li class="<?= $active == 'dashboard' ? 'active-page' : ''; ?>">
            <a href="/Admin"><i data-feather="home"></i>Dashboard</a>
        </li>
        <li class="sidebar-title">
            Manajemen
        </li>
        <li class="<?= $active == 'dokumen' ? 'active-page' : ''; ?>">
            <a href="/Admin/Dokumen"><i data-feather="briefcase"></i>Dokumen</a>
        </li>
        <li class="<?= $active == 'dokumen' ? 'active-page' : ''; ?>">
        </li>
        <?php if (implode(',', user()->getRoles()) == 'superadmin') { ?>
            <li class="<?= $active == 'user' ? 'active-page' : ''; ?>">
                <a href="/Admin/UserManage"><i data-feather="users"></i>Users</a>
            </li>
        <?php } ?>
        <li>
            <a href="/Admin/Transaksi"><i data-feather="sidebar"></i>Transaksi</a>
        </li>
        <li class="sidebar-title">
            User
        </li>
        <li class="<?= $active == 'profil' ? 'active-page' : ''; ?>">
            <a href="/Admin/User/edit/<?= session()->user_id; ?>"><i data-feather="user"></i>Profil</a>
        </li>
        <li>
            <a href="/logout"><i data-feather="log-out"></i>Logout</a>
        </li>
</div>