<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo base_url('assets/assets_shop')?>/img/dekorasi1.png"
                            alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success"><b>Selamat</b>Datang</h1>
                            <h3 class="h2">Di Layanan Pemesanan Online Bening Anugrah Decoration</h3>
                            <br>
                            <p>
                                <a class="btn btn-warning mb-2"
                                    href="<?php echo base_url('pelanggan/data_dekorasi')?>">Booking
                                    Now!</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo base_url('assets/assets_shop')?>/img/dekor1.jpeg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h2 class="h2 text-success"><b>Solusi Dekorasi Elegan Impianmu!</b></h2>
                            <p>
                                Kami hadir untuk memberikan sentuhan indah di setiap acara spesial Anda..
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo base_url('assets/assets_shop')?>/img/carapesan.png"
                            alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-success"><b>Panduan</b>Pemesanan</h1>
                            <h5 class="h5">Pemesanan maksimal H-4 sebelum Tanggal Acara Yaa!</h5>
                            <p>Jika terkendala dengan proses pemesanan melalui website ini silahkan hubungi
                                admin.</p>
                            <br>
                            <p>
                                <a class="btn btn-warning mb-2" target="_blank"
                                    href="https://wa.me/6285786372243">HUBUNGI
                                    ADMIN
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->




<section class="py-1">
    <div class="container px-4 px-lg-5 mt-5">
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach ($dekorasi as $dkr): ?>
            <div class="col mb-2">
                <div class="card h-80">
                    <!-- Gambar Produk -->
                    <div class="d-flex justify-content-center align-items-center"
                        style="height: 300px; overflow: hidden;">

                        <a href=""><img class="card-img-top "
                                src="<?php echo base_url('assets/dekorasi/'.$dkr->gambar) ?>"
                                style="width: 200px; height: 300px" alt=""></a>
                    </div>

                    <!-- Informasi Produk -->
                    <div class="card-body p-3">
                        <div class="text-center">
                            <h6 class="fw-semibold text-success mb-2"><?= $dkr->nama_dekorasi ?></h6>
                            <h6 class="fw-semibold mb-2">Rp. <?php echo number_format($dkr->harga,0,',','.') ?></h6>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="card-footer d-flex justify-content-center gap-2">
                        <?php if ($dkr->status == "0"): ?>
                        <span class="btn btn-danger btn-sm" disabled>Telah Dibooking</span>
                        <?php else: ?>
                        <?= anchor('pelanggan/tambah_booking/' . $dkr->id_dekorasi, '<button class="btn btn-warning btn-sm">Booking</button>') ?>
                        <?php endif; ?>

                        <a href="<?= base_url('pelanggan/detail_dekorasi/' . $dkr->id_dekorasi) ?>">
                            <button class="btn btn-dark btn-sm">Detail</button>
                        </a>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>