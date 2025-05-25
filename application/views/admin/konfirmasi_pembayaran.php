<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Konfirmasi Pembayaran</h1>
        </div>
        <center class="card" style="width: 55%">
            <div class="card-header">
                Konfirmasi Pembayaran
            </div>

            <div class="card-body">
                <form method="POST" action="<?php echo base_url('admin/cek_pembayaran')?>">

                    <?php foreach ($pembayaran as $pmb) : ?>
                    <form method="POST" action="<?php echo base_url('admin/cek_pembayaran/' . $pmb->id_booking) ?>">
                        <!-- Tombol Download -->
                        <button type="button" class="btn btn-sm btn-success"
                            onclick="window.location='<?php echo base_url('admin/lihat_pembayaran/' . $pmb->id_booking) ?>'">
                            <i class="fas fa-eye"></i> Lihat Bukti Pembayaran
                        </button>

                        <input type="hidden" name="id_booking" value="<?php echo $pmb->id_booking ?>">

                        <!-- Switch untuk Konfirmasi Pembayaran -->
                        <div class="custom-control custom-switch ml-5">
                            <input type="checkbox" class="custom-control-input"
                                id="switch_<?php echo $pmb->id_booking ?>" value="1" name="status_pembayaran"
                                <?php echo ($pmb->status_pembayaran == 1) ? 'checked' : ''; ?>>
                            <label class="custom-control-label"
                                for="switch_<?php echo $pmb->id_booking ?>">Konfirmasi</label>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                    <hr>
                    <?php endforeach; ?>


                </form>
            </div>
        </center>
    </section>
</div>