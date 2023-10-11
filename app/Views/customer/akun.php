<?= $this->extend('templates/customer/index'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <!-- ANCHOR SIDEBAR -->
        <div class="col-2 mb-3">
            <div class="sidebar rounded-3 shadow-lg mt-3 py-4 pe-3 ps-3">
                <div class="row">
                    <div class="col text-center">
                        <img src="<?= base_url($akun['avatar']); ?>" alt="" class="foto-avatar shadow">
                        <p class="mt-1">
                        <h6><?= $akun['nama'] ?></h6>
                        <span><?= $akun['email'] ?></span>
                        </p>
                    </div>
                </div>
                <hr class="mt-0">
                <div class="row">
                    <div class="col">
                        <h6>Profil Saya</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="list-pengaturan-akun">
                            <a href="<?= base_url('customer/akun') ?>">
                                <li class="list-akun rounded-1 <?= ($segment2 == 'akun') ? 'selected-pengaturan-akun' : ''; ?>">
                                    Akun
                                </li>
                            </a>
                            <a href="<?= base_url('customer/pembelian') ?>">
                                <li class="list-akun rounded-1 <?= ($segment2 == 'pembelian') ? 'selected-pengaturan-akun' : ''; ?>">
                                    Riwayat Pembelian
                                </li>
                            </a>
                            <a href="<?= base_url('logout') ?>">
                                <li class="list-akun-keluar rounded-1">
                                    Keluar
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <hr class="mt-0">
            </div>
        </div>
        <!-- ANCHOR CONTENT AKUN -->
        <div class="col-10">
            <div class="content rounded-3 shadow-lg mt-3 py-3 pe-4 ps-4 ">
                <form action="<?= base_url('customer/akun/save') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col text-center">
                            <img src="<?= base_url($akun['avatar']) ?>" alt="" class="foto shadow" id="previewImg">
                        </div>
                    </div>
                    <div class="mb-3 row mt-3">
                        <label for="inputAvatar" class="col-sm-2 col-form-label">Ubah Foto</label>
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm" id="formFileSm" type="file" name="avatar" onchange="previewFile(this)" accept="image/*">
                        </div>
                    </div>
                    <hr class="mt-0">
                    <div class="row">
                        <div class="col">
                            <h4 class="mb-3">Detail Akun</h4>
                            <!-- ANCHOR NAMA -->
                            <div class="mb-3 row">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="inputNama" name="nama" value="<?= $akun['nama']; ?>" required>
                                </div>
                            </div>
                            <!-- ANCHOR NAMA PENGGUNA -->
                            <div class="mb-3 row">
                                <label for="inputUsername" class="col-sm-2 col-form-label">Nama Pengguna</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="inputUsername" name="username" value="<?= $akun['username']; ?>" required>
                                </div>
                            </div>
                            <!-- ANCHOR EMAIL -->
                            <div class="mb-3 row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control form-control-sm" id="inputEmail" name="email" value="<?= $akun['email']; ?>" required>
                                </div>
                            </div>
                            <!-- ANCHOR PASSWORD -->
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control form-control-sm" id="inputPassword" name="password" value="<?= $akun['password']; ?>" required>
                                </div>
                            </div>
                            <!-- ANCHOR ALAMAT -->
                            <div class="mb-3 row">
                                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea name="alamat" class="form-control textarea" id="inputAlamat" rows="3" required><?= $akun['alamat']; ?></textarea>
                                </div>
                            </div>
                            <!-- ANCHOR KODE POS -->
                            <div class="mb-3 row">
                                <label for="inputKodePos" class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="inputKodePos" name="kodepos" value="<?= $akun['kode_pos']; ?>" maxlength="5" required>
                                </div>
                            </div>
                            <!-- ANCHOR NO HP -->
                            <div class="mb-3 row">
                                <label for="inputNoHp" class="col-sm-2 col-form-label">No. Handphone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="inputNoHp" name="nohp" value="<?= $akun['no_hp']; ?>" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col">
                                    <button type="submit" class="btn-save-akun rounded-2 shadow">SIMPAN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script>

<?= $this->endSection(); ?>