<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="shortcut icon" href="<?= base_url('favicon.ico'); ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/admin/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/admin/sidebar.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/admin/navbar.css'); ?>">

    <!-- ANCHOR GOOGLE FONT -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- ANCHOR GOOGLE ICON -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- ANCHOR CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- ANCHOR SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ANCHOR TINY MCE -->
    <script src="https://cdn.tiny.cloud/1/pke2gj61lhwk9889p5d4bw8h80ypjbe4qz93fi1ru0rzbdml/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



</head>

<body>

    <!-- Modal -->
    <?php
    if ($segment2 === 'database') {
        if ($segment3 === 'kategori') {
            echo $this->include('admin/database/kategori/tambah');
        } else if ($segment3 === 'admin') {
            if ($segment4 === '') {
                echo $this->include('admin/database/admin/tambah');
            }
        } else if ($segment3 === 'designer') {
            if ($segment4 === '') {
                echo $this->include('admin/database/designer/tambah');
            }
        }
    }
    ?>

    <?= $this->renderSection('content'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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


        $('#btn-tambah').click(function() {
            $('#form-tambah').fadeIn();
            $('.container').addClass('blur');
        });

        $('#btn-close-modal').click(function() {
            $('#form-tambah-data')[0].reset();
            $('#form-tambah').fadeOut();
            setTimeout(function() {
                $('.container').removeClass('blur')
            }, 300);
        });
    </script>
</body>

</html>