<div id="form-tambah" class="modal-custom position-relative">
    <div class="position-absolute top-0 start-50 translate-middle">
        <div class="row modal-content rounded-3 shadow mb-3">
            <div class="col">
                <form id="form-tambah-data" action="<?= base_url('admin/database/designer/tambah') ?>" method="post" enctype="multipart/form-data">
                    <div id="btn-close-modal" class="btn-close rounded-3 me-3 mt-3"></div>
                    <h3 class="text-center mt-3">Tambah Akun Designer</h3>
                    <hr>
                    <center class="mb-3">
                        <img class="avatar-form mb-2 rounded-circle" src="<?= base_url('asset/designer/akun/avatar-designer.png') ?>" alt="" id="previewAvatar">
                        <input class="form-control input-avatar" type="file" name="avatar" id="avatar" onchange="previewFile(this)" accept="image/*">
                    </center>
                    <div class="row mb-3">
                        <label for="inputNama" class="col-sm-4 col-form-label required">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" id="inputNama" required placeholder="Masukkan Nama Lengkap">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputUsername" class="col-sm-4 col-form-label required">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="username" id="inputUsername" required placeholder="Masukkan Username">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label required">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" id="inputEmail" required placeholder="Masukkan Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-4 col-form-label required">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" id="inputPassword" required placeholder="Masukkan Password" minlength="8">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputAlamat" class="col-sm-4 col-form-label required">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="alamat" id="inputAlamat" required placeholder="Masukkan Alamat">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNoHp" class="col-sm-4 col-form-label required">No. Handphone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="noHp" id="inputNoHp" required placeholder="Masukkan No. Handphone">
                        </div>
                    </div>
                    <button type="submit" class="btn-submit rounded-2 shadow">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewFile(input) {
        var file = $("#avatar").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#previewAvatar").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }

    }

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
</script>