<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pelanggan</h1>
        </div>

        <a href="<?= base_url('admin/tambah_pelanggan') ?>" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Pelanggan
        </a>

        <?= $this->session->flashdata('pesan') ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Gender</th>
                        <th>No. Whatsapp</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($user as $usr): ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $usr->nama ?></td>
                        <td><?= $usr->alamat ?></td>
                        <td><?= $usr->gender ?></td>
                        <td><?= $usr->no_telepon ?></td>
                        <td><?= $usr->email ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/delete_pelanggan/' . $usr->id_user) ?>"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <?php if (empty($user)) : ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada data pelanggan.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>