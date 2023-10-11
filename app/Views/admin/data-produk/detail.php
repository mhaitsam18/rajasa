<?= $this->extend('templates/admin/index') ?>

<?= $this->section('content') ?>

<div class="container pt-3">
    <div class="row">
        <div class="col-2 sidebar pt-3 rounded-3 shadow">
            <!-- ANCHOR SIDEBAR -->
            <?= $this->include('templates/admin/sidebar') ?>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col navbar ms-2 ps-3 pt-3 pb-3 rounded-3 shadow-sm">
                    <!-- ANCHOR NAVBAR -->
                    <?= $this->include('templates/admin/navbar') ?>
                </div>
            </div>
            <div class="row">
                <!-- ANCHOR CONTENT -->
                <div class="col content ms-2 mt-3 mb-3 ps-3 pe-3 pt-4 pb-2 rounded-3 shadow">
                    <div class="row">
                        <div class="col text-center">
                            <h3><?= $produk['judul'] ?></h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <form action="" method="post" enctype="multipart/form-data" id="myForm">
                                <input type="text" name="update" id="" value="true" hidden>
                                <div class="row mb-3">
                                    <label for="inputJudul" class="col-sm-2 col-form-label required">Judul Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="judul" id="inputJudul" required value="<?= $produk['judul'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputKategori" class="col-sm-2 col-form-label required">Kategori Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kategori" value="<?= $produk['idKategori'] ?>" hidden>
                                        <select class="form-select select-transaksi" aria-label="Default select example" required disabled>
                                            <option value="" disabled>-Pilih Kategori-</option>
                                            <?php
                                            foreach ($kategori as $kategori) { ?>
                                                <option value="<?= $kategori['id'] ?>" <?= ($produk['idKategori'] === $kategori['id']) ? 'selected' : ''; ?>>
                                                    <?= $kategori['kategori'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputHarga" class="col-sm-2 col-form-label required">Harga Produk</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text" id="basic-addon1" style="color:#707070">Rp</span>
                                            <input type="number" class="form-control" aria-label="harga" name="harga" value="<?= $produk['harga'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi Produk</label>
                                    <div class="col-sm-10">
                                        <textarea name="deskripsi" id="tiny"><?= $produk['deskripsi'] ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputGambar" class="col-sm-2 col-form-label">Gambar Produk</label>
                                    <div class="col-sm-10">
                                        <div class="row text-center">
                                            <div class="col me-3 ms-3">
                                                <div class="row mb-1">
                                                    <img src="<?= ($produk['gambar1'] !== '') ? base_url($produk['gambar1']) : base_url('asset/website/image-default.png') ?>" alt="" id="previewImg1">
                                                </div>
                                                <div class="row">
                                                    <label for="formFileSm" class="form-label" style="color: #707070;">Gambar 1</label>
                                                    <input class="form-control" type="file" name="gambar1" id="gambar1" onchange="previewFile(this)" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col me-3 ms-3">
                                                <div class="row mb-1">
                                                    <img src="<?= ($produk['gambar2'] !== '') ? base_url($produk['gambar2']) : base_url('asset/website/image-default.png') ?>" alt="" id="previewImg2">
                                                </div>
                                                <div class="row">
                                                    <label for="formFileSm" class="form-label" style="color: #707070;">Gambar 2</label>
                                                    <input class="form-control" type="file" name="gambar2" id="gambar2" onchange="previewFile(this)" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col me-3 ms-3">
                                                <div class="row mb-1">
                                                    <img src="<?= ($produk['gambar3'] !== '') ? base_url($produk['gambar3']) : base_url('asset/website/image-default.png') ?>" alt="" id="previewImg3">
                                                </div>
                                                <div class="row">
                                                    <label for="formFileSm" class="form-label" style="color: #707070;">Gambar 3</label>
                                                    <input class="form-control" type="file" name="gambar3" id="gambar3" onchange="previewFile(this)" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputStatus" class="col-sm-2 col-form-label required">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-select select-transaksi" aria-label="Default select example" name="status" required>
                                            <option value="" disabled>-Pilih Status-</option>
                                            <option value="Ready Stock" <?= ($produk['status'] === 'Ready Stock') ? 'selected' : ''; ?>>Ready Stock</option>
                                            <option value="Pre Order" <?= ($produk['status'] === 'Pre Order') ? 'selected' : ''; ?>>Pre Order</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDesigner" class="col-sm-2 col-form-label required">Designer</label>
                                    <div class="col-sm-10">
                                        <select class="form-select select-transaksi" aria-label="Default select example" name="designer" required>
                                            <option value="" disabled>-Pilih Designer-</option>
                                            <?php
                                            foreach ($designer as $designer) { ?>
                                                <option value="<?= $designer['id'] ?>" <?= ($produk['idDesigner'] === $designer['id'])  ? 'selected' : '' ?>>
                                                    <?= $designer['nama'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3 ps-3 pe-3">
                                    <button type="submit" class="btn-submit rounded-2 shadow">Perbarui</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    tinymce.init({
        selector: 'textarea#tiny',
        resize: 'both',
        max_height: 300
    });

    if (<?= json_encode(session()->getFlashdata('update_success')) ?>) {
        Swal.fire({
            title: 'Sukses',
            text: <?= json_encode(session()->getFlashdata('update_success')) ?>,
            icon: 'success',
        });
    } else if (<?= json_encode(session()->getFlashdata('update_error')) ?>) {
        Swal.fire({
            title: 'Gagal',
            text: <?= json_encode(session()->getFlashdata('update_error')) ?>,
            icon: 'error',
        });
    }

    function previewFile(input) {
        if (input.id === 'gambar1') {
            var file = $("#gambar1").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg1").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        } else if (input.id === 'gambar2') {
            var file = $("#gambar2").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg2").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        } else if (input.id === 'gambar3') {
            var file = $("#gambar3").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg3").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    }
</script>
<?= $this->endSection(); ?>