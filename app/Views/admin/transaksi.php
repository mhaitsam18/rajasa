<?= $this->extend('templates/admin/index'); ?>

<?= $this->section('content'); ?>

<div class="container pt-3">
    <div class="row">
        <div class="col-2 sidebar pt-3 pb-3 rounded-3 shadow">
            <!-- ANCHOR SIDEBAR -->
            <?= $this->include('templates/admin/sidebar') ?>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col navbar ms-2 ps-3 pt-3 pb-3 pe-3 rounded-3 shadow">
                    <!-- ANCHOR NAVBAR -->
                    <?= $this->include('templates/admin/navbar') ?>
                </div>
            </div>
            <div class="row">
                <!-- ANCHOR CONTENT -->
                <div class="col content ms-2 mt-3 ps-3 pe-3 pt-3 pb-3 rounded-3 shadow">
                    <!-- ANCHOR NAVBAR -->
                    <div class="row text-center mt-2 mb-3 ms-3 me-3">
                        <ul class="list-group list-group-horizontal">
                            <div class="col">
                                <a href="<?= base_url('admin/transaksi/all') ?>">
                                    <li class="list-group-item navbar-transaksi 
                                    <?php if ($segment3 === 'all') {
                                        echo 'navbar-transaksi-active';
                                    } ?>">
                                        Semua Transaksi
                                    </li>
                                </a>
                            </div>
                            <div class="col">
                                <a href="<?= base_url('admin/transaksi/selesai') ?>">
                                    <li class="list-group-item navbar-transaksi
                                    <?php if ($segment3 === 'selesai') {
                                        echo 'navbar-transaksi-active';
                                    } ?>">
                                        Selesai
                                    </li>
                                </a>
                            </div>
                            <div class="col">
                                <a href="<?= base_url('admin/transaksi/sedang-dikerjakan') ?>">
                                    <li class="list-group-item navbar-transaksi
                                    <?php if ($segment3 === 'sedang-dikerjakan') {
                                        echo 'navbar-transaksi-active';
                                    } ?>">
                                        Sedang Dikerjakan
                                    </li>
                                </a>
                            </div>
                            <div class="col">
                                <a href="<?= base_url('admin/transaksi/belum-dibayar') ?>">
                                    <li class="list-group-item navbar-transaksi
                                    <?php if ($segment3 === 'belum-dibayar') {
                                        echo 'navbar-transaksi-active';
                                    } ?>">
                                        Belum Dibayar
                                    </li>
                                </a>
                            </div>
                        </ul>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <form class="" role="search" action="" method="get">
                                <div class="input-group shadow-sm rounded-2">
                                    <input type="text" name="keyword" class="form-control search-transaksi " placeholder="Cari Nama" value="<?= $keyword; ?>" style="font-size: 10px;">
                                    <button type="submit" class="input-group-text logo-search" id="basic-addon2"><i class="bi bi-search" style="font-size: 10px;"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col d-flex flex-row-reverse">
                            <div class="dropdown ms-3">
                                <button class="dropdown-toggle btn-sm dropdown-filter-dashboard rounded-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    if ($pilihanTahun !== null) {
                                        echo $pilihanTahun;
                                    } else {
                                        echo 'Semua Tahun';
                                    }
                                    ?>
                                </button>
                                <ul class="dropdown-menu dropdown-filter-dashboard-menu">
                                    <li>
                                        <a class="dropdown-item dropdown-filter-dashboard-menu-item" href="<?= base_url('admin/transaksi/' . $kategori) ?>">Semua Tahun</a>
                                    </li>
                                    <?php
                                    for ($x = 0; $x < count($tahunTransaksi); $x++) {
                                        if ($tahunTransaksi[$x]['tahun'] !== '0') {
                                    ?>
                                            <li>
                                                <a class="dropdown-item dropdown-filter-dashboard-menu-item" href="<?= base_url('admin/transaksi/' . $kategori . '/' . $tahunTransaksi[$x]['tahun']) ?>"><?= $tahunTransaksi[$x]['tahun'] ?></a>
                                            </li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table class="table table-transaksi caption-top">
                                <thead class="border-bottom">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Transaksi</th>
                                        <th scope="col">Tanggal Transaksi</th>
                                        <th scope="col">Tanggal Pengiriman</th>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Status Transfer</th>
                                        <th scope="col">Nama Designer</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($transaksi) > 0) {
                                        $nomor = 0 + (10 * ($urutan - 1));
                                        for ($i = 0; $i < count($transaksi); $i++) { ?>
                                            <tr class="
                                            <?php
                                            if ($transaksi[$i]['status_transfer'] === 'Belum') {
                                                echo 'baris-belum-transfer';
                                            } elseif ($transaksi[$i]['status'] === 'On Going' && $transaksi[$i]['status_transfer'] === 'Selesai') {
                                                echo 'baris-sedang-dikerjakan';
                                            }
                                            ?>">
                                                <td><?= $nomor += 1; ?></td>
                                                <td><?= $transaksi[$i]['id']; ?></td>
                                                <td><?= $transaksi[$i]['tanggal_transaksi']; ?></td>
                                                <td><?= $transaksi[$i]['tanggal_pengiriman']; ?></td>
                                                <td><?= $transaksi[$i]['nama_customer']; ?></td>
                                                <td><?= $transaksi[$i]['produk']; ?></td>
                                                <td><?= $transaksi[$i]['kategori']; ?></td>
                                                <td><?= $transaksi[$i]['jumlah']; ?></td>
                                                <td>Rp<?= number_format($transaksi[$i]['total'], 2, ',', '.'); ?></td>
                                                <td><?= $transaksi[$i]['status']; ?></td>
                                                <td><?= $transaksi[$i]['status_transfer']; ?></td>
                                                <td><?= $transaksi[$i]['nama_designer']; ?></td>
                                                <td><a href="<?= base_url('admin/transaksi/details/' . $transaksi[$i]['id']); ?>" class="btn-detail-transaksi">Detail</a></td>
                                            </tr>
                                    <?php }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            if (count($transaksi) === 0) {
                                echo "<div class='alert alert-danger alert-data-kosong text-center' role='alert'>Data Tidak Ditemukan !!!</div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <!-- ANCHOR PAGINATION -->
                            <div class="row">
                                <div class="col mt-4">
                                    <?= $pager->links('transaksi', 'custom_pagination'); ?>
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