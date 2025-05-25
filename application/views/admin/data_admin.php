<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Admin</h1>
        </div>

        <a href="<?= base_url('admin/tambah_admin') ?>" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Admin
        </a>

        <?= $this->session->flashdata('pesan') ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
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
                        <td><?= $usr->username ?></td>
                        <td><?= $usr->alamat ?></td>
                        <td><?= $usr->gender ?></td>
                        <td><?= $usr->no_telepon ?></td>
                        <td><?= $usr->email ?></td>
                        <td class="text-center">
                            <span style="white-space: nowrap;">
                                <a href="<?= base_url('Admin/update_admin/') . $usr->id_user ?>"
                                    class="btn btn-sm btn-warning me-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('admin/delete_admin/' . $usr->id_user) ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus admin ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </span>
                        </td>

                    </tr>
                    <?php endforeach; ?>

                    <?php if (empty($user)) : ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada data Admin.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>