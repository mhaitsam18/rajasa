<?= $this->extend('templates/admin/index'); ?>

<?= $this->section('content'); ?>

<div class="container pt-3">
    <div class="row">
        <div class="col-2 sidebar pt-3 pb-3 rounded-3 shadow">
            <!-- ANCHOR SIDEBAR -->
            <?= $this->include('templates/admin/sidebar'); ?>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col navbar ms-2 ps-3 pt-3 pb-3 pe-3 rounded-3 shadow">
                    <!-- ANCHOR NAVBAR -->
                    <?= $this->include('templates/admin/navbar'); ?>
                </div>
            </div>
            <div class="row">
                <!-- ANCHOR CONTENT GRAFIK PENJUALAN -->
                <div class="col content ms-2 mt-3 ps-3 pe-3 pt-3 pb-3 rounded-3 shadow">
                    <div class="row">
                        <div class="col-7">
                            <h6 class="mb-3">Penjualan Produk (per Kategori)</h6>
                        </div>
                        <div class="col d-flex flex-row-reverse">
                            <div class="dropdown">
                                <button class="dropdown-toggle btn-sm dropdown-filter-dashboard rounded-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    if ($tahunKategori !== null && $tahunKategori !== 'all') {
                                        echo $tahunKategori;
                                    } else {
                                        echo 'Semua Tahun';
                                    }
                                    ?>
                                </button>
                                <ul class="dropdown-menu dropdown-filter-dashboard-menu">
                                    <li>
                                        <a class="dropdown-item dropdown-filter-dashboard-menu-item" href="<?= base_url('admin/dashboard/all/' . $tahunProfit . '/' . $tahunPerformansi); ?>">Semua Tahun</a>
                                    </li>
                                    <?php
                                    for ($x = 0; $x < count($tahunTransaksi); $x++) {
                                        if ($tahunTransaksi[$x]['tahun'] !== '0') {
                                    ?>
                                            <li>
                                                <a class="dropdown-item dropdown-filter-dashboard-menu-item" href="<?= base_url('admin/dashboard/' . $tahunTransaksi[$x]['tahun'] . '/' . $tahunProfit . '/' . $tahunPerformansi) ?>"><?= $tahunTransaksi[$x]['tahun'] ?></a>
                                            </li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        <canvas id="chartPenjualanKategori"></canvas>
                    </div>

                </div>
                <!-- ANCHOR PROFIT PERTAHUN -->
                <div class="col content ms-2 mt-3 ps-3 pe-3 pt-3 pb-3 rounded-3 shadow">
                    <div class="row">
                        <div class="col-7">
                            <h6 class="mb-3">Profit Pertahun</h6>
                        </div>
                        <div class="col d-flex flex-row-reverse">
                            <div class="dropdown">
                                <button class="dropdown-toggle btn-sm dropdown-filter-dashboard rounded-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    if ($tahunProfit !== null && $tahunProfit !== 'all') {
                                        echo $tahunProfit;
                                    } else {
                                        echo 'Semua Tahun';
                                    }
                                    ?>
                                </button>
                                <ul class="dropdown-menu dropdown-filter-dashboard-menu">
                                    <li>
                                        <a class="dropdown-item dropdown-filter-dashboard-menu-item" href="<?= base_url('admin/dashboard/' . $tahunKategori . '/all/' . $tahunPerformansi) ?>">Semua Tahun</a>
                                    </li>
                                    <?php
                                    for ($x = 0; $x < count($tahunTransaksi); $x++) {
                                        if ($tahunTransaksi[$x]['tahun'] !== '0') { ?>
                                            <li>
                                                <a class="dropdown-item dropdown-filter-dashboard-menu-item" href="<?= base_url('admin/dashboard/' . $tahunKategori . '/' . $tahunTransaksi[$x]['tahun'] . '/' . $tahunPerformansi) ?>"><?= $tahunTransaksi[$x]['tahun'] ?></a>
                                            </li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        <canvas id="chartProfitPertahun"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- ANCHOR TRANSAKSI TERBARU -->
                <div class="col content rounded-3 shadow ms-2 mt-3 ps-3 pe-3 pt-3 pb-3">
                    <h5>Transaksi Terbaru (Belum Selesai)</h5>
                    <form class="d-flex" role="search" action="" method="get">
                        <div class="input-group shadow-sm rounded-2">
                            <input type="text" name="keywordTransaksiTerbaru" class="form-control search-transaksi-terbaru " placeholder="Cari Nama" value="<?= $keywordTransaksiTerbaru; ?>" style="font-size: 10px;">
                            <button type="submit" class="input-group-text logo-search-transaksi-terbaru" id="basic-addon2"><i class="bi bi-search" style="font-size: 10px;"></i></button>
                        </div>
                    </form>
                    <table class="table table-transaksi-terbaru caption-top">
                        <caption class="caption-table">Total Data : <?= count($transaksiTerbaru) ?></caption>
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Transaksi</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Status Transfer</th>
                                <th scope="col">Nama Designer</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($transaksiTerbaru) > 0) {
                                $nomor = 0;
                                for ($i = 0; $i < count($transaksiTerbaru); $i++) { ?>
                                    <tr>
                                        <td><?= $nomor += 1; ?></td>
                                        <td><?= $transaksiTerbaru[$i]['id']; ?></td>
                                        <td><?= $transaksiTerbaru[$i]['tanggal_transaksi']; ?></td>
                                        <td><?= $transaksiTerbaru[$i]['nama_customer']; ?></td>
                                        <td><?= $transaksiTerbaru[$i]['produk']; ?></td>
                                        <td><?= $transaksiTerbaru[$i]['kategori']; ?></td>
                                        <td><?= $transaksiTerbaru[$i]['jumlah']; ?></td>
                                        <td>Rp<?= number_format($transaksiTerbaru[$i]['total'], 2, ',', '.'); ?></td>
                                        <td><?= $transaksiTerbaru[$i]['status']; ?></td>
                                        <td><?= $transaksiTerbaru[$i]['status_transfer']; ?></td>
                                        <td><?= $transaksiTerbaru[$i]['nama_designer']; ?></td>
                                        <td><a href="<?= base_url('admin/transaksi/details/' . $transaksiTerbaru[$i]['id']); ?>" class="btn-detail-transaksi-terakhir">Detail</a></td>
                                    </tr>
                            <?php }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    if (count($transaksiTerbaru) === 0) {
                        echo "<div class='alert alert-danger alert-data-kosong text-center' role='alert'>Data Tidak Ditemukan !!!</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <!-- ANCHOR PERFORMANSI DESIGNER -->
                <div class="col content ms-2 mt-3 ps-3 pe-3 pt-3 pb-3 rounded-3 shadow">
                    <div class="row">
                        <div class="col-7">
                            <h6 class="mb-3">Performansi Designer
                            </h6>
                        </div>
                        <div class="col d-flex flex-row-reverse">
                            <div class="dropdown ms-3">
                                <button class="dropdown-toggle btn-sm dropdown-filter-dashboard rounded-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    if ($tahunPerformansi !== null) {
                                        echo $tahunPerformansi;
                                    } else {
                                        echo 'Semua Tahun';
                                    }
                                    ?>
                                </button>
                                <ul class="dropdown-menu dropdown-filter-dashboard-menu">
                                    <li>
                                        <a class="dropdown-item dropdown-filter-dashboard-menu-item" href="<?= base_url('admin/dashboard/' . $tahunKategori . '/' . $tahunProfit . '/') ?>">Semua Tahun</a>
                                    </li>
                                    <?php
                                    for ($x = 0; $x < count($tahunTransaksi); $x++) {
                                        if ($tahunTransaksi[$x]['tahun'] !== '0') {
                                    ?>
                                            <li>
                                                <a class="dropdown-item dropdown-filter-dashboard-menu-item" href="<?= base_url('admin/dashboard/' . $tahunKategori . '/' . $tahunProfit . '/' . $tahunTransaksi[$x]['tahun']) ?>"><?= $tahunTransaksi[$x]['tahun'] ?></a>
                                            </li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                            <form class="d-flex" role="search" action="" method="get">
                                <div class="input-group shadow-sm rounded-2">
                                    <input type="text" name="keywordPerformansi" class="form-control search-performansi " placeholder="Cari Nama" value="<?= $keywordPerformansi; ?>" style="font-size: 10px;">
                                    <button type="submit" class="input-group-text logo-search" id="basic-addon2"><i class="bi bi-search" style="font-size: 10px;"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-performansi-designer caption-top">
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <?php for ($i = 0; $i < count($kategori); $i++) { ?>
                                    <th scope="col"><?= $kategori[$i]['kategori']; ?></th>
                                <?php } ?>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 0;
                            if (count($performansiDesigner) > 0) {
                                for ($i = 0; $i < count($designer); $i++) {
                                    for ($l = 0; $l < count($kelompokDesigner); $l++) {
                                        if ($designer[$i]['id'] === $kelompokDesigner[$l]['id']) {
                                            $total = 0;
                            ?>
                                            <tr>
                                                <td><?= $nomor += 1; ?></td>
                                                <td><?= $designer[$i]['nama']; ?></td>
                                                <?php
                                                for ($j = 0; $j < count($kategori); $j++) {
                                                    $jumlahKategori = 0;
                                                    for ($k = 0; $k < count($performansiDesigner); $k++) {
                                                        if (
                                                            $designer[$i]['id'] === $performansiDesigner[$k]['idDesigner'] &&
                                                            $kategori[$j]['id'] === $performansiDesigner[$k]['idKategori']
                                                        ) {
                                                            $total += $performansiDesigner[$k]['jumlah'];
                                                            $jumlahKategori += $performansiDesigner[$k]['jumlah'];
                                                        }
                                                    }
                                                    echo "<td>" . $jumlahKategori . "</td>";
                                                } ?>
                                                <td><?= $total; ?></td>
                                            </tr>
                            <?php
                                        }
                                    }
                                }
                            } ?>
                            <caption class="caption-table">Total Data : <?= $nomor; ?></caption>
                        </tbody>
                    </table>
                    <?php
                    if (count($performansiDesigner) === 0) {
                        echo "<div class='alert alert-danger alert-data-kosong text-center' role='alert'>Data Tidak Ditemukan !!!</div>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    Chart.defaults.font.size = 10;
    Chart.defaults.font.family = "'Fira Sans', sans-serif";
    // ANCHOR KATEGORI
    const kategori = <?= json_encode($kategori); ?>;
    const transaksiKategori = <?= json_encode($transaksiKategori); ?>;

    // ANCHOR GRAFIK PENJUALAN BERDASARKAN KATEGORI
    const grafikPenjualan = document.getElementById('chartPenjualanKategori');

    // ANCHOR LABEL KATEGORI DAN DATA TRANSAKSI
    const dataTransaksiKategori = [];
    const labelKategori = [];

    kategori.forEach(elementKategori => {
        labelKategori.push(elementKategori['kategori']);
        for (let index = 0; index < transaksiKategori.length; index++) {
            if (elementKategori['id'] === transaksiKategori[index]['idKategori']) {
                dataTransaksiKategori.push(parseInt(transaksiKategori[index]['jumlah']));
                break;
            } else {
                if (index === transaksiKategori.length - 1) {
                    dataTransaksiKategori.push(0);
                    break;
                }
            }
        }
    });

    // ANCHOR DATA TRANSAKSI KATEGORI
    const dataKategori = {
        labels: labelKategori,
        datasets: [{
            data: dataTransaksiKategori,
            backgroundColor: '#598285',
            borderRadius: 5,
            hoverBackgroundColor: "#73a9ad",
            maxBarThickness: 15,
            pointStyle: 'rectRounded',
        }]
    };
    const configKategori = {
        type: 'bar',
        data: dataKategori,
        options: {
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        drawOnChartArea: false,
                        display: false,
                    },
                    ticks: {
                        color: '#000000',
                    },
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10,
                        color: '#707070',
                    },
                    grid: {
                        color: '#F3F4F8',
                    },
                },
            },
            plugins: {
                legend: {
                    labels: {
                        boxWidth: 0,
                    },
                    display: false,
                },
                tooltip: {
                    enabled: true,
                    padding: 7,
                    backgroundColor: 'rgba(10, 45, 48, .9)',
                    position: 'nearest',
                    yAlign: 'bottom',
                    usePointStyle: true,
                    footerSpacing: 20,
                    titleAlign: 'center',
                    bodyAlignL: 'center',
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || ' Produk Terjual : ';
                            label += context.parsed.y;
                            return label;
                        }
                    }
                },
            },
        },

    }
    new Chart(grafikPenjualan, configKategori);
    // ANCHOR AKHIR PENJUALAN PER KATEGORI

    // ANCHOR AWAL PROFIT PER TAHUN
    // ANCHOR FORMAT RUPIAH
    const formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
    });

    // ANCHOR DATA PROFIT
    const profitPertahun = <?= json_encode($profitPertahun) ?>;

    // ANCHOR DATA PROFIT PERTAHUN
    const dataProfitPertahun = [];

    // ANCHOR MEMBUAT LABEL X 
    const tahunProfit = <?= json_encode($tahunProfit) ?>;
    const tahunTransaksi = <?= json_encode($tahunTransaksi) ?>;
    var labelProfit = [];
    if (tahunProfit === null || tahunProfit === 'all') {
        tahunTransaksi.forEach(element => {
            if (element['tahun'] !== '0') {
                labelProfit.push(element['tahun']);
            }
        });

        for (let x = 0; x < labelProfit.length; x++) {
            for (let y = 0; y < profitPertahun.length; y++) {
                if (labelProfit[x] === profitPertahun[y]['tahun']) {
                    dataProfitPertahun.push(parseFloat(profitPertahun[y]['total']));
                    break;
                } else {
                    if (y === profitPertahun.length - 1) {
                        dataProfitPertahun.push(0);
                        break;
                    }
                }
            }
        };

    } else {
        labelProfit = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];

        for (let x = 1; x <= labelProfit.length; x++) {
            for (let y = 0; y < profitPertahun.length; y++) {
                if (x === parseInt(profitPertahun[y]['bulan'])) {
                    dataProfitPertahun.push(parseInt(profitPertahun[y]['total']));
                    break;
                } else {
                    if (y === profitPertahun.length - 1) {
                        dataProfitPertahun.push(0);
                        break;
                    }
                }
            }
        };
    }



    // ANCHOR GRAFIK PROFIT PERTAHUN
    const grafikProfit = document.getElementById('chartProfitPertahun');

    // ANCHOR DATA GRAFIK PROFIT PERTAHUN
    const dataProfit = {
        labels: labelProfit,
        datasets: [{
            data: dataProfitPertahun,
            backgroundColor: '#7481ad',
            hoverBackgroundColor: "#9fa8c6",
            hoverBorderWidth: 20,
            borderWidth: 2,
            borderColor: '#dfe2ec',
            pointStyle: 'circle',
            tension: 0.3,
        }]
    };
    const configProfit = {
        type: 'line',
        data: dataProfit,
        options: {
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        drawOnChartArea: false,
                        display: false,
                        color: '#F3F4F8',
                    },
                    ticks: {
                        color: '#000000',
                    },
                },
                y: {
                    title: {
                        display: true,
                        text: "Rupiah",
                        font: {
                            size: 10,
                            weight: 'bold',
                        }
                    },
                    beginAtZero: true,
                    ticks: {
                        stepSize: 500000,
                        color: '#707070',
                    },
                    grid: {
                        color: '#F3F4F8',
                    },
                },
            },
            plugins: {
                legend: {
                    labels: {
                        boxWidth: 0,
                    },
                    display: false,
                },
                tooltip: {
                    enabled: true,
                    padding: 7,
                    backgroundColor: 'rgba(28, 33, 48, .9)',
                    position: 'nearest',
                    yAlign: 'top',
                    usePointStyle: true,
                    footerSpacing: 20,
                    titleAlign: 'center',
                    bodyAlignL: 'center',
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || ' Total Profit : ';
                            label += formatter.format(context.parsed.y);
                            return label;
                        }
                    }
                },
            },
        },

    }
    new Chart(grafikProfit, configProfit);

    // ANCHOR AKHIR PROFIT PER TAHUN
</script>
<?= $this->endSection(); ?>