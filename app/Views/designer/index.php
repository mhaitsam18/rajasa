<?= $this->extend('templates/designer/index') ?>

<?= $this->section('content') ?>

<div class="container pt-3">
    <div class="row">
        <div class="col-2 sidebar pt-3 pb-3 rounded-3 shadow">
            <!-- ANCHOR SIDEBAR -->
            <?= $this->include('templates/designer/sidebar') ?>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col navbar ms-2 ps-3 pt-3 pb-3 pe-3 rounded-3 shadow">
                    <!-- ANCHOR NAVBAR -->
                    <?= $this->include('templates/designer/navbar') ?>
                </div>
            </div>
            <div class="row">
                <!-- ANCHOR CONTENT -->
                <div class="col content ms-2 mt-3 ps-3 pe-3 pt-3 pb-3 rounded-3 shadow">

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>