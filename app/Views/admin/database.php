<?= $this->extend('templates/admin/index') ?>

<?= $this->section('content') ?>

<div class="container pt-3">
    <div class="row">
        <div class="col-2 sidebar pt-3 pb-3 rounded-3 shadow">
            <!-- ANCHOR SIDEBAR -->
            <?= $this->include('templates/admin/sidebar') ?>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col navbar ms-2 ps-3 pt-3 pb-3 rounded-3 shadow">
                    <!-- ANCHOR NAVBAR -->
                    <?= $this->include('templates/admin/navbar') ?>
                </div>
            </div>
            <?php if ($segment3 === '') { ?>
                <div class="row">
                    <!-- ANCHOR CONTENT -->
                    <div class="col ms-2 ps-3 pe-3 pt-2 pb-2 rounded-3">
                        <div class="row mt-3">
                            <a href="<?= base_url('admin/database/kategori') ?>" class="col-5 text-center shadow rounded-3 p-3 menu-database mx-auto mb-3">
                                <span class="material-symbols-rounded" id="icon-database">
                                    category
                                </span>
                                <p class="h4 mt-2 judul-database"><b>Kategori Produk</b></p>
                            </a>
                            <a href="<?= base_url('admin/database/admin') ?>" class="col-5 text-center shadow rounded-3 p-3 menu-database mx-auto mb-3">
                                <span class="material-symbols-rounded" id="icon-database">
                                    admin_panel_settings
                                </span>
                                <p class="h4 mt-2 judul-database"><b>Akun Admin</b></p>
                            </a>
                            <a href="<?= base_url('admin/database/designer') ?>" class="col-5 text-center shadow rounded-3 p-3 menu-database mx-auto mb-3">
                                <span class="material-symbols-rounded" id="icon-database">
                                    draw
                                </span>
                                <p class="h4 mt-2 judul-database"><b>Akun Designer</b></p>
                            </a>
                            <a href="<?= base_url('admin/database/customer') ?>" class="col-5 text-center shadow rounded-3 p-3 menu-database mx-auto mb-3">
                                <span class="material-symbols-rounded" id="icon-database">
                                    groups
                                </span>
                                <p class="h4 mt-2 judul-database"><b>Akun Customer</b></p>
                            </a>
                            <a href="<?= base_url('admin/database/tipe') ?>" class="col-5 text-center shadow rounded-3 p-3 menu-database mx-auto mb-3">
                                <span class="material-symbols-rounded" id="icon-database">
                                    folder_shared
                                </span>
                                <p class="h4 mt-2 judul-database"><b>Tipe Akun</b></p>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } else {
            ?>
                <div class="row">
                    <div class="col content ms-2 mt-3 ps-3 pe-3 pt-2 pb-2 rounded-3 shadow">
                        <!-- ANCHOR NAVBAR CONTENT -->
                        <div class="row text-center mt-2 mb-3 ms-3 me-3">
                            <ul class="list-group list-group-horizontal">
                                <div class="col">
                                    <a href="<?= base_url('admin/database/kategori') ?>">
                                        <li class="list-group-item navbar-transaksi
                                    <?php if ($segment3 === 'kategori') {
                                        echo 'navbar-transaksi-active';
                                    } ?>">
                                            Kategori
                                        </li>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="<?= base_url('admin/database/admin') ?>">
                                        <li class="list-group-item navbar-transaksi
                                    <?php if ($segment3 === 'admin') {
                                        echo 'navbar-transaksi-active';
                                    } ?>">
                                            Akun Admin
                                        </li>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="<?= base_url('admin/database/designer') ?>">
                                        <li class="list-group-item navbar-transaksi
                                    <?php if ($segment3 === 'designer') {
                                        echo 'navbar-transaksi-active';
                                    } ?>">
                                            Akun Designer
                                        </li>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="<?= base_url('admin/database/customer') ?>">
                                        <li class="list-group-item navbar-transaksi
                                    <?php if ($segment3 === 'customer') {
                                        echo 'navbar-transaksi-active';
                                    } ?>">
                                            Akun Customer
                                        </li>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="<?= base_url('admin/database/tipe') ?>">
                                        <li class="list-group-item navbar-transaksi
                                    <?php if ($segment3 === 'tipe') {
                                        echo 'navbar-transaksi-active';
                                    } ?>">
                                            Tipe Akun
                                        </li>
                                    </a>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php
                if ($segment3 === 'kategori') {
                    echo $this->include('admin/database/kategori');
                } else if ($segment3 === 'admin') {
                    if ($segment4 === 'detail') {
                        echo $this->include('admin/database/admin/detail');
                    } else {
                        echo $this->include('admin/database/admin');
                    }
                } else if ($segment3 === 'designer') {
                    if ($segment4 === 'detail') {
                        echo $this->include('admin/database/designer/detail');
                    } else {
                        echo $this->include('admin/database/designer');
                    }
                } else if ($segment3 === 'customer') {
                    echo $this->include('admin/database/customer');
                } else if ($segment3 === 'tipe') {
                    echo $this->include('admin/database/tipe');
                }
            } ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>