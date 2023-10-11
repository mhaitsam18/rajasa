<?= $this->extend('templates/auth/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
  <!-- Kiri -->
  <div class="row">
    <div class="col-md-6 col-sm-12 login z-2">

      <div class="row">
        <div class="col">
          <div class="judul ms-3 mt-3 mb-3 me-5">
            <h5><i class="bi bi-dot"></i>Rajasa Finishing</h5>
          </div>
        </div>
      </div>

      <div class="row mt-1 ms-5 me-5">
        <div class="col ">
          <h2>Halaman Daftar</h2>
          <p>Silahkan masukkan detail Anda!</p>
          <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" role="alert">
              <?= session()->getFlashdata('error'); ?>
            </div>
          <?php endif; ?>
          <hr>
        </div>
      </div>

      <div class="row ms-5 mb-3 me-5">
        <div class="col">
          <form action="<?= base_url('signup/auth'); ?>" method="post" enctype="">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control shadow-sm" id="email" name="email" autofocus required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control shadow-sm" id="password" name="password" required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="username" class="form-control shadow-sm" id="username" name="username" required>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Nama Lengkap</label>
              <input type="name" class="form-control shadow-sm" id="name" name="name" required>
            </div>

            <button type="submit" class="submit shadow-sm">Daftar</button>
          </form>
        </div>
      </div>
      <hr class="mt-0">
      <div class="row mt-2 ms-5 me-5">
        <div class="col text-center">
          Sudah memiliki akun? <a class="signin" href="<?= base_url('login'); ?>">Masuk</a>
        </div>
      </div>

      <div class="row d-sm-none d-md-block">
        <div class="col footer ms-3 mb-1">
          <span>© Rajasa Finishing 2023</span>
        </div>
      </div>

    </div>
    <!-- akhir kiri -->

    <!-- kanan -->
    <div class="col-6 logo position-relative d-sm-none d-md-block">
      <img src="<?= base_url('Logo.png') ?>" alt="" srcset="" class="position-absolute top-50 start-50 translate-middle" style="width: 35%;">
      <div class="row">
        <div class="col z-1 blur">
        </div>
      </div>
    </div>
    <!-- akhir kanan -->
  </div>

</div>
<?= $this->endSection(); ?>