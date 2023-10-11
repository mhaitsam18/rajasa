<?= $this->extend('templates/designer/index') ?>

<?= $this->section('content') ?>

<div class="container pt-3">
    <div class="row">
        <div class="col-2 sidebar pt-3 rounded-3 shadow">
            <!-- ANCHOR SIDEBAR -->
            <?= $this->include('templates/designer/sidebar') ?>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col navbar ms-2 ps-3 pt-3 pb-3 pe-3 rounded shadow">
                    <!-- ANCHOR NAVBAR -->
                    <?= $this->include('templates/designer/navbar') ?>
                </div>
            </div>
            <div class="row">
                <!-- ANCHOR CONTENT -->
                <div class="col content ms-2 mt-3 mb-3 ps-3 pe-3 pt-4 pb-2 rounded-3 shadow">
                    <div class="row">
                        <div class="col tex-center">
                            <h3>Tambah Produk</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <form action="<?= base_url('designer/data-produk/tambah') ?>" method="post" enctype="multipart/form-data">
                                <input type="text" name="tambah" id="" value="true" hidden>
                                <div class="row mb-3">
                                    <label for="inputJudul" class="col-sm-2 col-form-label required">Judul Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="judul" id="inputJudul" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputKategori" class="col-sm-2 col-form-label required">Kategori Produk</label>
                                    <div class="col-sm-10">
                                        <select class="form-select select-transaksi" aria-label="Default select example" name="kategori" required>
                                            <option value="" selected disabled>-Pilih Kategori-</option>
                                            <?php
                                            foreach ($kategori as $kategori) { ?>
                                                <option value="<?= $kategori['id'] ?>"><?= $kategori['kategori'] ?></option>
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
                                            <input type="number" class="form-control" aria-label="harga" name="harga" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi Produk</label>
                                    <div class="col-sm-10">
                                        <textarea name="deskripsi" id="tiny"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputGambar" class="col-sm-2 col-form-label">Gambar Produk</label>
                                    <div class="col-sm-10">
                                        <div class="row text-center">
                                            <div class="col me-3 ms-3">
                                                <div class="row mb-1">
                                                    <img src="<?= base_url('asset/website/image-default.png') ?>" alt="" id="previewImg1">
                                                </div>
                                                <div class="row">
                                                    <label for="formFileSm" class="form-label" style="color: #707070;">Gambar 1</label>
                                                    <input class="form-control" type="file" name="gambar1" id="gambar1" onchange="previewFile(this)" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col me-3 ms-3">
                                                <div class="row mb-1">
                                                    <img src="<?= base_url('asset/website/image-default.png') ?>" alt="" id="previewImg2">
                                                </div>
                                                <div class="row">
                                                    <label for="formFileSm" class="form-label" style="color: #707070;">Gambar 2</label>
                                                    <input class="form-control" type="file" name="gambar2" id="gambar2" onchange="previewFile(this)" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col me-3 ms-3">
                                                <div class="row mb-1">
                                                    <img src="<?= base_url('asset/website/image-default.png') ?>" alt="" id="previewImg3">
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
                                            <option value="" selected disabled>-Pilih Status-</option>
                                            <option value="Ready Stock">Ready Stock</option>
                                            <option value="Pre Order">Pre Order</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3 ps-3 pe-3">
                                    <button type="submit" class="btn-submit rounded-2 shadow">Tambah</button>
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

    if (<?= json_encode(session()->getFlashdata('add_success')) ?>) {
        Swal.fire({
            title: 'Sukses',
            text: <?= json_encode(session()->getFlashdata('add_success')) ?>,
            icon: 'success',
        });
    } else if (<?= json_encode(session()->getFlashdata('add_error')) ?>) {
        Swal.fire({
            title: 'Gagal',
            text: <?= json_encode(session()->getFlashdata('add_error')) ?>,
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

<?= $this->endSection() ?>