<div class="row">
    <!-- ANCHOR CONTENT BODY -->
    <div class="col content ms-2 mt-3 ps-3 pt-3 pb-3 rounded-3 shadow">
        <div class="row mb-3">
            <div class="col">
                <button id="btn-tambah" class="btn-tambah shadow rounded-2">Tambah Designer</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <table class="table table-transaksi caption-top">
                    <caption>Total data : <?= count($designer); ?></caption>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id Designer</th>
                            <th scope="col">Nama Designer</th>
                            <th scope="col">Username</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($designer) > 0) {
                            $nomor = 0;
                            for ($i = 0; $i < count($designer); $i++) { ?>
                                <tr>
                                    <td><?= $nomor += 1 ?></td>
                                    <td><?= $designer[$i]['id'] ?></td>
                                    <td>
                                        <img class="table-avatar me-2 rounded-circle" src="<?= base_url($designer[$i]['avatar']); ?>" alt="avatar-akun">
                                        <?= $designer[$i]['nama'] ?>
                                    </td>
                                    <td><?= $designer[$i]['username'] ?></td>
                                    <td><?= $designer[$i]['alamat'] ?></td>
                                    <td><?= $designer[$i]['no_hp'] ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/database/designer/detail/' . $designer[$i]['id']); ?>" id="btn-detail" class="btn-detail">Detail</a>
                                        <button class="btn-hapus" onclick="hapus('<?= base_url('admin/database/designer/hapus/' . $designer[$i]['id']); ?>')">Hapus</button>
                                    </td>
                                </tr>
                        <?php }
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                if (count($designer) === 0) {
                    echo "<div class='alert alert-danger alert-data-kosong text-center' role='alert'>Data Tidak Ditemukan !!!</div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    function hapus(link) {
        Swal.fire({
            title: 'Hapus',
            text: 'Ingin menghapus akun Designer ini? \n Semua data yang berhubungan dengan akun ini akan terhapus',
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