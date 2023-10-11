    <div class="col">
        <span class="tanggal p-2 rounded-5"><?= date("d-m-Y") ?></span>
    </div>
    <?php if ($segment2 === 'transaksi' && $segment3 !== 'details') { ?>
        <div class="col d-flex justify-content-end">
            <a href="<?= base_url('admin/transaksi/cetak/' . $segment3 . '/' . $segment4) ?>" class="p-2 export rounded-3" target="_blank">
                <i class="bi bi-printer"></i> Cetak
            </a>
        </div>
    <?php } ?>