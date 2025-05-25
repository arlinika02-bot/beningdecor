<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Dekorasi</h1>
        </div>
        <a href="<?php echo base_url('Admin/tambah_dekorasi') ?>" class="btn btn-primary mb-3">+ Tambah Dekorasi</a>

        <?php echo $this->session->flashdata('pesan') ?>

        <div class="table-responsive">
            <table class="table table-responsive table-bordered table-striped text-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th>Nama Dekorasi</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th> Action </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no=1;
                    foreach ($dekorasi as $dkr) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td>
                            <img width="65px" src="<?php echo base_url(). 'assets/dekorasi/'.$dkr->gambar ?>">
                        </td>
                        <td><?php echo $dkr->kode_kategori ?></td>
                        <td><?php echo $dkr->nama_dekorasi ?></td>
                        <td><?php echo $dkr->keterangan ?></td>
                        <td><?php

                if ($dkr->status == "0") {
                    echo "<span class= 'badge badge-danger'>Tidak Tersedia</span>";
                }else {
                    echo "<span class= 'badge badge-primary'>Tersedia</span>";
                }

                    ?>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="<?php echo base_url('Admin/detail_dekorasi/').$dkr->id_dekorasi ?>"
                                    class="btn btn-sm btn-dark me-2"><i class="fas fa-eye"></i></a>

                                <a href="<?php echo base_url('Admin/update_dekorasi/').$dkr->id_dekorasi ?>"
                                    class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>

                                <a href="<?php echo base_url('Admin/delete_dekorasi/').$dkr->id_dekorasi ?>"
                                    class="btn btn-sm btn-danger me-2"><i class="fas fa-trash"></i></a>
                            </div>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

    </section>
</div>