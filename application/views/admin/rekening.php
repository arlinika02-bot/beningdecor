<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Data Rekening</h1>
        </div>
    </div>

    <a href="<?php echo base_url('Admin/tambah_rekening') ?>" class="btn btn-primary mb-3">+ Tambah Rekening</a>

    <?php echo $this->session->flashdata('pesan') ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>No. Rekening</th>
                    <th>Nama Bank</th>
                    <th>Nama Pemilik</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; foreach ($rekening as $rek): ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $rek->no_rekening ?></td>
                    <td><?php echo $rek->nama_bank ?></td>
                    <td><?php echo $rek->nama_pemilik ?></td>
                    <td>
                        <a href="<?php echo base_url('Admin/update_rekening/').$rek->id_rekening ?>"
                            class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?php echo base_url('Admin/delete_rekening/').$rek->id_rekening ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin ingin menghapus rekening ini?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>