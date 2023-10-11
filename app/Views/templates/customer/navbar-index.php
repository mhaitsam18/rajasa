<div class="container-fluid navbar-home border-0 shadow-lg">
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a href="<?= base_url(); ?>"><img src="<?= base_url('logo-navbar.png'); ?>"
                                alt="Logo Rajasa Finishing" srcset="" width="150px" class="me-2"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link rounded-3 dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Katalog
                                    </a>
                                    <ul class="dropdown-menu border-0 shadow-lg">
                                        <?php foreach ($kategori as $k) : ?>
                                        <li><a class="dropdown-item"
                                                href="<?= base_url('/produk/' . $k->kategori . '/terbaru') ?>"><?= $k->kategori; ?></a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-3"
                                        href="<?= base_url('/produk/all/terbaru') ?>">Produk</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-3" href="#">Pembayaran</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-3" href="<?= base_url('chat') ?>"
                                        target="_blank">Chat</a>
                                </li>
                                <li class="nav-item ms-2">
                                    <form class="d-flex" role="search" action="<?= base_url('produk/all/terbaru') ?>"
                                        method="get">
                                        <div class="input-group">
                                            <input type="text" name="keyword" class="form-control search border-0"
                                                placeholder="Cari" value="<?= $keyword; ?>">
                                            <button type="submit" class="input-group-text bg-white border-0"
                                                id="basic-addon2"><i class="bi bi-search"></i></button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                            <div class="d-flex">
                                <?php if (!session()->get('isLogin')) { ?>
                                <a href="<?= base_url('login'); ?>" class="btn-masuk text-center rounded-1">Masuk</a>
                                <?php } else {
                                    if (session()->get('tipe') !== '3') { ?>
                                <a href="<?= base_url('login'); ?>" class="btn-masuk text-center rounded-1">Masuk</a>
                                <?php } else { ?>
                                <span class="name-account me-2"><?= $akun['nama']; ?></span>
                                <div class="dropstart">
                                    <a class="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="<?= base_url($akun['avatar']) ?>" alt="avatar" class="avatar" />
                                    </a>
                                    <ul class="dropdown-menu border-0 shadow me-2">
                                        <li><a class="dropdown-item" href="<?= base_url('customer/akun') ?>">Akun</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Keluar</a></li>
                                    </ul>
                                </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

</div>