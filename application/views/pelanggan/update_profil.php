<div class="main-content">
    <section class="section" style="padding-top: 40px; padding-bottom: 40px;">
        <div class="container">
            <div class="section-header text-center mb-4">
                <h1>Update Profil</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form method="POST" action="<?= base_url('Pelanggan/edit_profil') ?>">
                                <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">

                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" id="nama"
                                        value="<?= $user['nama']; ?>" required>
                                    <?= form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username"
                                        value="<?= $user['username']; ?>" required>
                                    <?= form_error('username', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="alamat" rows="3"
                                        required><?= $user['alamat']; ?></textarea>
                                    <?= form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" class="form-control" id="gender" required>
                                        <option value="Laki-laki"
                                            <?= ($user['gender'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            <?= ($user['gender'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan
                                        </option>
                                    </select>
                                    <?= form_error('gender', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="no_telepon">No Telp/Whatsapp</label>
                                    <input type="text" name="no_telepon" class="form-control" id="no_telepon"
                                        value="<?= $user['no_telepon']; ?>" required>
                                    <?= form_error('no_telepon', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="<?= $user['email']; ?>" required>
                                    <?= form_error('email', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group text-center mt-4">
                                    <button type="submit" class="btn btn-success mr-2">Update</button>
                                    <a href="<?= base_url('pelanggan/profil'); ?>" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>