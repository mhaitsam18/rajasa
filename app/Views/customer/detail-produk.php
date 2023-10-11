<?= $this->extend('templates/customer/index'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="content rounded-3 shadow-lg mt-3 py-3 pe-4 ps-4 ">
                <div class="row">
                    <div class="col-4">
                        <!-- ANCHOR CONTENT KIRI -->
                        <div class="row">
                            <div class="col">
                                <div id="carouselExample" class="carousel carousel-dark slide rounded-3 shadow" style="width:28em">
                                    <div class="carousel-inner">
                                        <?php for ($i = 1; $i < 4; $i++) {
                                            if ($produk['gambar' . $i]) {
                                        ?>
                                                <div class="carousel-item <?= $i == 1 ? 'active' : ''; ?>">
                                                    <img src="<?= base_url($produk['gambar' . $i]) ?>" class="rounded-3" style="width:28em" alt="...">
                                                </div>
                                        <?php
                                            }
                                        } ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <!-- ANCHOR CONTENT TENGAH -->
                        <div class="row">
                            <div class="col">
                                <h2><?= $produk['judul'] ?></h2>
                                <hr>
                                <h3><?= number_format($produk['harga'], 2, ',', '.') ?></h3>
                                <p>
                                    <i class="bi bi-star-fill icon-rating"></i><span class="rating ms-1 me-1"><?= $produk['rating'] ?></span>|
                                    Terjual <?= $produk['terjual'] ?> produk
                                </p>
                                <hr>
                                <h4>Deskripsi</h4>
                                <p><?= $produk['deskripsi'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <!-- ANCHOR CONTENT KANAN -->
                        <div class="row">
                            <div class="col">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="exampleInput" class="form-label">Jumlah Produk</label>
                                        <input name="jumlah" type="number" class="form-control form-control-sm" id="jumlah" onkeypress="cekHarga()" onchange="checkHarga()" value="0">
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-3">
                                                Total Harga
                                            </div>
                                            <div class="col text-end">
                                                <h5>Rp<span id="harga">0</span></h5>
                                            </div>
                                        </div>
                                        <input name="total" type="number" class="form-control form-control-sm" id="total" hidden>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn-pesan rounded-3">Pesan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function checkHarga() {
        let total = document.getElementById('total');
        let jumlah = document.getElementById('jumlah');
        let harga = document.getElementById('harga');
        total.value = jumlah.value * <?= $produk['harga'] ?>;

        totalHarga = jumlah.value * <?= $produk['harga'] ?>;
        var number_string = totalHarga.toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
            harga.innerHTML = rupiah;
        }
    }
</script>
</script>

<?= $this->endSection(); ?>