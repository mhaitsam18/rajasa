<div class="row">
    <!-- ANCHOR CONTENT BODY -->
    <div class="col content ms-2 mt-3 ps-3 pt-3 pb-3 rounded-3 shadow">
        <div class="row mb-3">
            <div class="col">
                <button id="btn-tambah" class="btn-tambah shadow rounded-2">Tambah Kategori</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <table class="table table-transaksi caption-top">
                    <caption>Total data : <?= count($kategori) ?></caption>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id Kategori</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($kategori) > 0) {
                            $nomor = 0;
                            for ($i = 0; $i < count($kategori); $i++) { ?>
                                <tr>
                                    <td><?= $nomor += 1; ?></td>
                                    <td><?= $kategori[$i]['id'] ?></td>
                                    <td><?= $kategori[$i]['kategori'] ?></td>
                                    <td>
                                        <button class="btn-hapus" onclick="hapus('<?= base_url('admin/database/kategori/hapus/' . $kategori[$i]['id']); ?>')">Hapus</button>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                if (count($kategori) === 0) {
                    echo "<div class='alert alert-danger alert-data-kosong text-center' role='alert'>Data Tidak Ditemukan !!!</div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    if (<?= json_encode(session()->getFlashdata('delete_success')) ?>) {
        Swal.fire({
            title: 'Sukses',
            text: <?= json_encode(session()->getFlashdata('delete_success')) ?>,
            icon: 'success',
        });
    } else if (<?= json_encode(session()->getFlashdata('delete_error')) ?>) {
        Swal.fire({
            title: 'Gagal',
            text: <?= json_encode(session()->getFlashdata('delete_error')) ?>,
            icon: 'error',
        });
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

    function hapus(link) {
        Swal.fire({
            title: 'Hapus',
            text: 'Ingin menghapus kategori ini? \n Semua data yang berhubungan dengan kategori ini akan terhapus',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
            }
        })
    }
</script>