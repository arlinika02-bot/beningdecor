<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Data Kategori</h1>
        </div>
    </div>

    <a href="<?php echo base_url('Admin/tambah_kategori') ?>" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    <?php echo $this->session->flashdata('pesan') ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; foreach ($kategori as $ktg): ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $ktg->kode_kategori ?></td>
                    <td><?php echo $ktg->nama_kategori ?></td>
                    <td>
                        <a href="<?php echo base_url('Admin/update_kategori/').$ktg->id_kategori ?>"
                            class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?php echo base_url('Admin/delete_kategori/').$ktg->id_kategori ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>