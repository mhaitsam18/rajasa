<?= $this->extend('templates/admin/index'); ?>

<?= $this->section('content'); ?>

<div class="container pt-3">
    <div class="row">
        <div class="col-2 sidebar pt-3 pb-3 rounded-3 shadow">
            <!-- ANCHOR SIDEBAR -->
            <?= $this->include('templates/admin/sidebar'); ?>
        </div>
        <div class="col-10 mb-3">
            <div class="row">
                <div class="col navbar ms-2 ps-3 pt-3 pb-3 rounded-3 shadow-sm">
                    <!-- ANCHOR NAVBAR -->
                    <?= $this->include('templates/admin/navbar') ?>
                </div>
            </div>
            <div class="row">
                <!-- ANCHOR CONTENT -->
                <div class="col content ms-2 mt-3 ps-3 pe-3 pt-3 pb-3 rounded-3 shadow">
                    <h4><?= $transaksi[0]->id; ?></h4>
                    <h5><?= $transaksi[0]->produk; ?></h5>
                    <h6><?= date_format(date_create($transaksi[0]->tanggal_transaksi), 'd-m-Y'); ?></h6>
                    <hr>
                    <form action="" method="post">
                        <input type="text" name="update" value="yes" hidden>
                        <div class="row mb-3">
                            <label for="inputIdTransaksi" class="col-sm-2 col-form-label">Id Transaksi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id" id="inputidTransaksi" value="<?= $transaksi[0]->id ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTanggalTransaksi" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_transaksi" id="inputTanggalTransaksi" value="<?= $transaksi[0]->tanggal_transaksi ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTanggalPengiriman" class="col-sm-2 col-form-label">Tanggal Pengiriman</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_pengiriman" id="inputTanggalPengiriman" value="<?= $transaksi[0]->tanggal_pengiriman ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="inputNamaCustomer" class="col-sm-2 col-form-label">Nama Customer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_customer" id="inputNamaCustomer" value="<?= $transaksi[0]->nama_customer ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNoHpCustomer" class="col-sm-2 col-form-label">Telepon Customer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_hp_customer" id="inputNoHpCustomer" value="<?= $transaksi[0]->no_hp_customer ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputAlamatCustomer" class="col-sm-2 col-form-label">Alamat Customer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat_customer" id="inputAlamatCustomer" value="<?= $transaksi[0]->alamat_customer ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputKodePosCustomer" class="col-sm-2 col-form-label">Kode Pos Customer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kode_pos_customer" id="inputKodePosCustomer" value="<?= $transaksi[0]->kode_pos_customer ?>" disabled>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="inputIdProduk" class="col-sm-2 col-form-label">Id Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id_produk" id="inputIdProduk" value="<?= $transaksi[0]->id_produk ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputProduk" class="col-sm-2 col-form-label">Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="produk" id="inputProduk" value="<?= $transaksi[0]->produk ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kategori" id="inputKategori" value="<?= $transaksi[0]->kategori ?>" disabled>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="inputJumlah" class="col-sm-2 col-form-label">Jumlah Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jumlah" id="inputJumlah" value="<?= $transaksi[0]->jumlah ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTotal" class="col-sm-2 col-form-label">Total Harga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="total" id="inputTotal" value="Rp<?= number_format($transaksi[0]->total, 2, ',', '.'); ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputStatusTransfer" class="col-sm-2 col-form-label">Status Transfer</label>
                            <div class="col-sm-10">
                                <select class="form-select select-transaksi" aria-label="Default select example" name="status_transfer">
                                    <option value="Belum" <?= $transaksi[0]->status_transfer === 'Belum' ? 'selected' : '' ?>>Belum</option>
                                    <option value="Selesai" <?= $transaksi[0]->status_transfer === 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select select-transaksi" aria-label="Default select example" name="status">
                                    <option value="On Going" <?= $transaksi[0]->status === 'On Going' ? 'selected' : '' ?>>On Going</option>
                                    <option value="Selesai" <?= $transaksi[0]->status === 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="inputDesigner" class="col-sm-2 col-form-label">Designer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="designer" id="inputDesigner" value="<?= $transaksi[0]->nama_designer ?>" disabled>
                            </div>
                        </div>
                        <button type="submit" class="btn-submit rounded-2 shadow">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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
</script>

<?= $this->endSection(); ?>