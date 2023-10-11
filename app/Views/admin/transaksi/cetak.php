<?php
$file_name = 'rajasa-transaksi-' . $status . '-' . $tahun . '.xls';

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$file_name}");
?>

<center>
    <h1>Rekapan Data Transaksi <br /> Rajasa Finishing</h1>
    <h2>Status : <?= $status ?></h2>
    <h3>Tahun : <?= $tahun ?></h3>
</center>

<div class="row mt-3">
    <div class="col">
        <table class="table table-transaksi caption-top" border="1" cellpadding="5">
            <thead class="border-bottom">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Tanggal Pengiriman</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Designer</th>
                    <th scope="col">Status</th>
                    <th scope="col">Status Transfer</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalProfit = 0;
                if (count($transaksi) > 0) {
                    $nomor = 0;
                    for ($i = 0; $i < count($transaksi); $i++) { ?>
                        <tr>
                            <th><?= $nomor += 1; ?></th>
                            <td><?= $transaksi[$i]['id']; ?></td>
                            <td><?= $transaksi[$i]['tanggal_transaksi']; ?></td>
                            <td><?= $transaksi[$i]['tanggal_pengiriman']; ?></td>
                            <td><?= $transaksi[$i]['nama_customer']; ?></td>
                            <td><?= $transaksi[$i]['produk']; ?></td>
                            <td><?= $transaksi[$i]['kategori']; ?></td>
                            <td><?= $transaksi[$i]['nama_designer']; ?></td>
                            <td><?= $transaksi[$i]['status']; ?></td>
                            <td><?= $transaksi[$i]['status_transfer']; ?></td>
                            <td><?= $transaksi[$i]['jumlah']; ?></td>
                            <td>Rp<?= number_format($transaksi[$i]['total'], 2, ',', '.'); ?></td>
                        </tr>
                <?php
                        $totalProfit += $transaksi[$i]['total'];
                    }
                }
                ?>
                <tr>
                    <th colspan="11">Total Profit</th>
                    <th>Rp<?= number_format($totalProfit, 2, ',', '.') ?></th>
                </tr>
            </tbody>
        </table>
        <?php
        if (count($transaksi) === 0) {
            echo "<div class='alert alert-danger alert-data-kosong text-center' role='alert'>Data Tidak Ditemukan !!!</div>";
        }
        ?>
    </div>
</div>