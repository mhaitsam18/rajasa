<?= $this->extend('templates/customer/index'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col rounded-3 shadow-lg mt-3 py-3 pe-4 ps-4">
            <div class="row">
                <!-- ANCHOR KONTEN KIRI -->
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h3>"Karya cetakan <span class="tagline-about">berkualitas</span>,<br>mewujudkan <span class="tagline-about">impian</span> Anda."</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam qui, consectetur rem molestiae veniam veritatis earum. Perspiciatis doloribus, alias vero quam ut porro placeat repudiandae odit accusamus iusto quos dolores!
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-4">
                        <div class="col">
                            <h4>Tim Kami</h4>
                            <!-- ANCHOR AVATAR -->
                            <div class="row mt-2">
                                <div class="col text-center">
                                    <img class="avatar-tim rounded-circle shadow mb-1" src="https://api.dicebear.com/6.x/micah/svg?seed=Annie" alt="avatar" />
                                    <h6>Kamilia</h6>
                                    <span>Manajer</span>
                                </div>
                                <div class="col text-center">
                                    <img class="avatar-tim rounded-circle shadow mb-1" src="https://api.dicebear.com/6.x/micah/svg?seed=Cookie" alt="avatar" />
                                    <h6>Kamilia</h6>
                                    <span>Editor</span>
                                </div>
                                <div class="col text-center">
                                    <img class="avatar-tim rounded-circle shadow mb-1" src="https://api.dicebear.com/6.x/micah/svg?seed=Charlie" alt="avatar" />
                                    <h6>Kamilia</h6>
                                    <span>Editor</span>
                                </div>
                                <div class="col text-center">
                                    <img class="avatar-tim rounded-circle shadow mb-1" src="https://api.dicebear.com/6.x/micah/svg?seed=Sassy" alt="avatar" />
                                    <h6>Kamilia</h6>
                                    <span>Editor</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ANCHOR KONTEN KANAN -->
                <div class="col text-center">
                    <div class="rounded-3 shadow-lg" style="text-decoration:none; overflow:hidden;max-width:100%;width:500px;height:500px;">
                        <div id="google-maps-canvas" style="height:100%; width:100%;max-width:100%;">
                            <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Mega+Mall+Ciputat,+Jl.+Ir+H.+Juanda,+Cemp.+Putih,+Kec.+Ciputat+Tim.,+Kota+Tangerang+Selatan,+Banten+15419&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>