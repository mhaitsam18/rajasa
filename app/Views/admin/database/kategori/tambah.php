<div id="form-tambah" class="modal-custom position-relative">
    <div class="position-absolute top-0 start-50 translate-middle">
        <div class="row modal-content rounded-3 shadow mb-3">
            <div class="col">
                <form id="form-tambah-data" action="<?= base_url('admin/database/kategori/tambah') ?>" method="post">
                    <div id="btn-close-modal" class="btn-close rounded-3 me-3 mt-3"></div>
                    <h3 class="text-center mt-3">Tambah Kategori</h3>
                    <hr>
                    <div class="row mb-3">
                        <label for="inputKategori" class="col-sm-4 col-form-label required">Nama Kategori</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="kategori" id="inputKategori" required placeholder="Masukkan Nama Kategori">
                        </div>
                    </div>
                    <button type="submit" class="btn-submit rounded-2 shadow">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>