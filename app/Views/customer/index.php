<?= $this->extend('templates/customer/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <!-- JUMBOTRON -->
            <div class="container shadow-lg jumbotron rounded-3 mt-3 py-5 pe-5 ps-5">
                <div class="row">
                    <div class="col text-center">
                        <img src="<?= base_url('asset/website/photocopy.svg') ?>" alt="" width="">
                    </div>
                    <div class="col my-auto">
                        <h2 class="text-jumbotron">CETAK KALENDER, UNDANGAN PERNIKAHAN, BROSUR ATAU LAIN-LAIN?</h2>
                        <a href="<?= base_url('/produk/all/terbaru') ?>" class="btn btn-print mt-2">CETAK SEKARANG</a>
                    </div>
                </div>
            </div>
            <!-- END JUMBOTRON -->
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="container shadow-lg rounded-3 mt-3 py-5 pe-5 ps-5 content">
                <div class="row">
                    <div class="col">
                        <h3 class="title-content text-center">MEDIA CETAK KAMI</h3>
                    </div>
                </div>
                <hr>
                <!-- ANCHOR CETAK -->
                <div class="row">
                    <div class="col">
                        <h4 class="title-sub-content text-center">CETAK</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-3">
                        <div class="card card-content position-relative text-center rounded-3">
                            <img src="<?= base_url('asset/website/kalender.jpg') ?>" class="card-img-top rounded-3" alt="kalender">
                            <h6 class="card-text-sub-content position-absolute rounded-bottom-3 py-2 m-0 ">KALENDER</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card card-content position-relative text-center rounded-3">
                            <img src="<?= base_url('asset/website/buku.jpg') ?>" class="card-img-top rounded-3" alt="buku">
                            <h6 class="card-text-sub-content position-absolute rounded-bottom-3 py-2 m-0 ">BUKU</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card card-content position-relative text-center rounded-3">
                            <img src="<?= base_url('asset/website/undangan.jpg') ?>" class="card-img-top rounded-3" alt="undangan">
                            <h6 class="card-text-sub-content position-absolute rounded-bottom-3 py-2 m-0 ">UNDANGAN</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card card-content position-relative text-center rounded-3">
                            <img src="<?= base_url('asset/website/brosur.jpg') ?>" class="card-img-top rounded-3" alt="brosur">
                            <h6 class="card-text-sub-content position-absolute rounded-bottom-3 py-2 m-0 ">BROSUR</h6>
                        </div>
                    </div>
                </div>
                <!-- ANCHOR AKHIR CETAK -->
                <!-- ANCHOR TEKSTIL -->
                <div class="row">
                    <div class="col mt-5">
                        <h4 class="title-sub-content text-center">TEKSTIL</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-3">
                        <div class="card card-content position-relative text-center rounded-3">
                            <img src="<?= base_url('asset/website/apron.jpg') ?>" class="card-img-top rounded-3" alt="apron">
                            <h6 class="card-text-sub-content position-absolute rounded-bottom-3 py-2 m-0 ">APRON</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card card-content position-relative text-center rounded-3">
                            <img src="<?= base_url('asset/website/kaos.jpg') ?>" class="card-img-top rounded-3" alt="kaos">
                            <h6 class="card-text-sub-content position-absolute rounded-bottom-3 py-2 m-0 ">KAOS</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card card-content position-relative text-center rounded-3">
                            <img src="<?= base_url('asset/website/totebag.jpg') ?>" class="card-img-top rounded-3" alt="totebag">
                            <h6 class="card-text-sub-content position-absolute rounded-bottom-3 py-2 m-0 ">TOTEBAG</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card card-content position-relative text-center rounded-3">
                            <img src="<?= base_url('asset/website/pouchbag.jpg') ?>" class="card-img-top rounded-3" alt="pouchbag">
                            <h6 class="card-text-sub-content position-absolute rounded-bottom-3 py-2 m-0 ">POUCH BAG
                            </h6>
                        </div>
                    </div>
                </div>
                <!-- ANCHOR AKHIR TEKSTIL -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>