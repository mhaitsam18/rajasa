<?= $this->extend('templates/designer/index') ?>

<?= $this->section('content') ?>

<div class="container pt-3">
    <div class="row">
        <div class="col-2 sidebar pt-3 pb-3 rounded-3 shadow">
            <!-- ANCHOR SIDEBAR -->
            <?= $this->include('templates/designer/sidebar') ?>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col navbar ms-2 ps-3 pt-3 pb-3 pe-3 rounded-3 shadow">
                    <!-- ANCHOR NAVBAR -->
                    <?= $this->include('templates/designer/navbar') ?>
                </div>
            </div>
            <div class="row">
                <!-- ANCHOR CONTENT -->
                <div class="col content ms-2 mt-3 ps-3 pe-3 pt-3 pb-3 rounded-3 shadow">
                    <!-- ANCHOR NAVBAR -->
                    <div class="row text-center mt-2 mb-3 ms-3 me-3">
                        <ul class="list-group list-group-horizontal">
                            <div class="col">
                                <a href="<?= base_url('designer/data-produk/all') ?>">
                                    <li class="list-group-item navbar-transaksi 
                                    <?php if ($segment3 === 'all') {
                                        echo 'navbar-transaksi-active';
                                    } ?>">
                                        Semua Produk
                                    </li>
                                </a>
                            </div>
                            <?php
                            foreach ($kategori as $kategori) { ?>
                                <div class="col">
                                    <a href="<?= base_url('designer/data-produk/' . $kategori['kategori']) ?>">
                                        <li class="list-group-item navbar-transaksi
                                    <?php if ($segment3 === $kategori['kategori']) {
                                        echo 'navbar-transaksi-active';
                                    } ?>">
                                            <?= $kategori['kategori'] ?>
                                        </li>
                                    </a>
                                </div>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- ANCHOR TABLE DATA PRODUK -->
                <div class="col content ms-2 mt-3 ps-3 pe-3 pt-3 pb-3 rounded-3 shadow">
                    <div class="row mb-3">
                        <div class="col">
                            <a class="btn-tambah-produk shadow rounded-2" href="<?= base_url('designer/data-produk/tambah') ?>">Tambah Produk</a>
                        </div>
                    </div>
                    <form class="" role="search" action="" method="get">
                        <div class="input-group shadow-sm rounded-2">
                            <input type="text" name="keyword" class="form-control search-default" placeholder="Cari Judul Produk" value="<?= $keyword; ?>" style="font-size: 10px;">
                            <button type="submit" class="input-group-text logo-search" id="basic-addon2"><i class="bi bi-search" style="font-size: 10px;"></i></button>
                        </div>
                    </form>
                    <div class="row mt-3">
                        <div class="col">
                            <table class="table table-designer caption-top">
                                <thead class="border-bottom">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Produk</th>
                                        <th scope="col">Judul Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Rating</th>
                                        <th scope="col">Terjual</th>
                                        <th scope="col">Dibuat</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Designer</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($produk) > 0) {
                                        $nomor = 0 + (10 * ($urutan - 1));
                                        for ($i = 0; $i < count($produk); $i++) { ?>
                                            <tr>
                                                <td><?= $nomor += 1; ?></td>
                                                <td><?= $produk[$i]['id']; ?></td>
                                                <td><?= $produk[$i]['judul']; ?></td>
                                                <td>Rp<?= number_format($produk[$i]['harga'], 2, ',', '.'); ?></td>
                                                <td>
                                                    <img src="<?= base_url($produk[$i]['gambar1']) ?>" alt="" width="35em">
                                                </td>
                                                <td><?= $produk[$i]['status']; ?></td>
                                                <td><?= $produk[$i]['rating']; ?></td>
                                                <td><?= $produk[$i]['terjual']; ?></td>
                                                <td><?= date_format(date_create($produk[$i]['created']), 'd-m-Y'); ?></td>
                                                <td><?= $produk[$i]['kategori']; ?></td>
                                                <td><?= $produk[$i]['designer']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('designer/data-produk/details/' . $produk[$i]['id']); ?>" class="btn-detail">Detail</a>
                                                    <button class="btn-hapus" onclick="hapus('<?= base_url('designer/data-produk/hapus/' . $produk[$i]['id']); ?>')">Hapus</button>
                                                </td>
                                            </tr>
                                    <?php }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            if (count($produk) === 0) {
                                echo "<div class='alert alert-danger alert-data-kosong text-center' role='alert'>Data Tidak Ditemukan !!!</div>";
                            }
                            ?>
                            <!-- ANCHOR PAGINATION -->
                            <div class="row">
                                <div class="col mt-2">
                                    <?= $pager->links('produkDesigner', 'custom_pagination'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>