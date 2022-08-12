<?php
$role = $this->session->userdata('role');
?>
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Transaksi
</div>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaction" aria-expanded="true" aria-controls="transaction">
        <i class="fas fa-money-bill-wave"></i>
        <span>Data Transaksi</span>
    </a>
    <div id="transaction" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Input:</h6>
            <a class="collapse-item" href="<?= base_url('Admin/itemInList') ?>">Barang Masuk</a>
            <a class="collapse-item" href="<?= base_url('Admin/itemOutList') ?>">Barang Keluar</a>
            <a class="collapse-item" href="<?= base_url('Admin/returnList') ?>">Barang Kembali</a>
        </div>
    </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Master Data
</div>
<?php if ($role == '1') { ?>
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Supper Admin
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#datavalue" aria-expanded="true" aria-controls="datavalue">
            <i class="fas fa-cog"></i></i>
            <span>Control Panel</span>
        </a>
        <div id="datavalue" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Control:</h6>
                <a class="collapse-item" href="<?= base_url('Admin/itemTypeList') ?>">Kondisi Barang</a>
                <a class="collapse-item" href="<?= base_url('Admin/itemList') ?>">Barang</a>
                <a class="collapse-item" href="<?= base_url('Admin/workerList') ?>">Teknisi</a>
                <a class="collapse-item" href="<?= base_url('Admin/teamList') ?>">Team</a>
                <a class="collapse-item" href="<?= base_url('Admin/closingList') ?>">Closing</a>
                <a class="collapse-item" href="<?= base_url('Admin/logsList') ?>">Logs</a>
                <a class="collapse-item" href="#" id="Report">Report</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#galery" aria-expanded="true" aria-controls="galery">
            <i class="fas fa-user-cog"></i>
            <span>User</span>
        </a>
        <div id="galery" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Input:</h6>
                <a class="collapse-item" href="<?= base_url('Admin/userList') ?>">User</a>
            </div>
        </div>
    </li>
<?php } ?>