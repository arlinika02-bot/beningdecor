<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Dekorasi</h1>
        </div>
    </section>

    <?php foreach($detail as $dt) : ?>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <!-- Gambar di sebelah kiri -->
                <div class="col-md-5">
                    <img src="<?= base_url().'assets/dekorasi/'.$dt->gambar ?>" alt="Gambar Dekorasi"
                        class="img-fluid rounded shadow-sm" style="max-height: 300px; object-fit: cover;">
                </div>

                <!-- Detail di sebelah kanan -->
                <div class="col-md-7">
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>Kategori</strong></td>
                            <td>
                                <?php
                                if($dt->kode_kategori == "PKG"){
                                    echo "Package";
                                } elseif ($dt->kode_kategori == "DKR") {
                                    echo "Only Dekorasi";
                                } else {
                                    echo "<span class='text-danger'>Kategori dekorasi belum terdaftar</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Nama Dekorasi</strong></td>
                            <td><?= $dt->nama_dekorasi ?></td>
                        </tr>
                        <tr>
                            <td><strong>Keterangan</strong></td>
                            <td><?= $dt->keterangan ?></td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong></td>
                            <td>
                                <?php
                                if($dt->status == "0"){
                                    echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                } else {
                                    echo "<span class='badge badge-primary'>Tersedia</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Harga</strong></td>
                            <td><?= $dt->harga ?></td>
                        </tr>
                    </table>
                    <div class="form-group text-right">
                        <a class="btn btn-sm btn-danger" href="<?php echo base_url('Admin/dekorasi') ?>">Kembali</a>
                        <a class="btn btn-sm btn-warning"
                            href="<?php echo base_url('Admin/update_dekorasi/'.$dt->id_dekorasi) ?>">Update</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>