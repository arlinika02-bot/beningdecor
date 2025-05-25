<!-- Produk Dekorasi -->
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
                        <a href=""><img class="card-img-top"
                                src="<?php echo base_url('assets/dekorasi/'.$dkr->gambar) ?>"
                                style="width: 200px; height: 300px" alt=""></a>
                    </div>

                    <!-- Informasi Produk -->
                    <div class="card-body p-3">
                        <div class="text-center">
                            <h6 class="fw-semibold text-success mb-2"><?= $dkr->nama_dekorasi ?></h6>
                            <h6 class="fw-semibold mb-2">Rp. <?php echo number_format($dkr->harga, 0, ',', '.') ?>
                            </h6>
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