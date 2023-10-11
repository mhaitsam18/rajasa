<?= $this->extend('templates/customer/index'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <!-- ANCHOR SIDEBAR -->
        <div class="col-2 mb-3">
            <div class="sidebar rounded-3 shadow-lg mt-3 py-4 pe-3 ps-3">
                <div class="row">
                    <div class="col">
                        <h5>Filter</h5>
                    </div>
                </div>
                <hr class="mt-0">
                <!-- ANCHOR FILTER KATEGORI -->
                <div class="row mt-2">
                    <div class="col">
                        <h6>Kategori</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="list-filter-kategori">
                            <a href="<?= base_url('/produk/all/terbaru') ?>">
                                <li class="filter-kategori rounded-1">
                                    Semua Produk
                                </li>
                            </a>
                            <?php foreach ($kategori as $k) : ?>
                                <a href="<?= base_url('/produk/' . $k->kategori . '/terbaru') ?>">
                                    <li class="filter-kategori 
                                        <?php if ($segment2 === $k->kategori) {
                                            echo 'selected-filter-kategori';
                                        } ?>
                                        rounded-1">
                                        <?= $k->kategori; ?>
                                    </li>
                                </a>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <hr class="mt-0">
            </div>
        </div>
        <!-- ANCHOR CONTENT -->
        <div class="col-10">
            <div class="content rounded-3 shadow-lg mt-3 py-3 pe-4 ps-4 ">
                <!-- ANCHOR KATEGORI -->
                <div class="row">
                    <div class="col">
                        <span class="label-jumlah-produk">
                            Menampilkan <span class="label-angka-produk"><?= $jumlahProduk ?></span> produk
                        </span>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <span class="label-urutkan">Urutkan : </span>
                        <form action="">
                            <div class="select-urutkan ms-2 rounded-2">
                                <select class="btn-urutkan rounded-2" name="urutkan" id="filter" onchange="filterUrutan()">
                                    <option class="option-urutkan" value="terbaru" <?php if ($segment3 === 'terbaru') {
                                                                                        echo 'selected';
                                                                                    } ?>>
                                        Terbaru</option>
                                    <option class="option-urutkan" value="terendah" <?php if ($segment3 === 'terendah') {
                                                                                        echo 'selected';
                                                                                    } ?>>
                                        Harga Terendah</option>
                                    <option class="option-urutkan" value="tertinggi" <?php if ($segment3 === 'tertinggi') {
                                                                                            echo 'selected';
                                                                                        } ?>>
                                        Harga Tertinggi</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <!-- ANCHOR CONTENT -->
                <div class="row">
                    <?php if ($jumlahProduk === 0) { ?>
                        <div class="alert alert-produk-kosong" role="alert">
                            Produk kosong
                        </div>
                    <?php } ?>
                    <?php foreach ($produk as $produk) { ?>
                        <div class="col-2 mb-3">
                            <a href="<?= base_url('detail/' . $produk['id']) ?>" class="produk">
                                <div class="card card-produk rounded-2">
                                    <img src="<?= base_url($produk['gambar1']) ?>" class="card-img-top gambar-produk" alt="image">
                                    <div class="card-body card-body-produk rounded-bottom p-2">
                                        <h5 class="card-title card-title-harga mt-1">Rp<span class="harga-produk"><?= number_format($produk['harga'], 2, ',', '.') ?></span></h5>
                                        <p class="card-text card-text-produk mt-2"><?= $produk['judul'] ?></p>
                                        <div class="footer-produk">
                                            <i class="bi bi-star-fill icon-rating"></i><span class="rating ms-1 me-1"><?= $produk['rating'] ?></span>|
                                            <span class="footer-terjual ms-1">Terjual <?= $produk['terjual'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <!-- ANCHOR PAGINATION -->
                <div class="row">
                    <div class="col mt-4">
                        <?= $pager->links('produk', 'custom_pagination'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ANCHOR FILTER PRODUK -->
<script>
    // ANCHOR FILTER PRODUK
    function filterUrutan() {
        var segment1 = <?= json_encode($segment1) ?>;
        var segment2 = <?= json_encode($segment2) ?>;
        var base_url = <?= json_encode(base_url()) ?>;
        var filter = document.getElementById('filter');
        var valueFilter = filter.value;
        var link = base_url + segment1 + '/' + segment2 + '/' + valueFilter;
        location.replace(link);
    }
</script>
<?= $this->endSection(); ?>