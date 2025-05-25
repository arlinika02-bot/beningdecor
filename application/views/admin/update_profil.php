<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Update Profil</h1>
        </div>
    </div>

    <form method="POST" action="<?php echo base_url('Admin/edit_profil')?>">

        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
            <input type="text" name="nama" class="form-control" id="nama" value="<?= $user['nama']; ?>" required>
            <?php echo form_error('nama', '<div class="text-small text-danger">','</div>') ?>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" value="<?= $user['username']; ?>"
                required>
            <?php echo form_error('username', '<div class="text-small text-danger">','</div>') ?>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" rows="3"
                required><?= $user['alamat']; ?></textarea>
            <?php echo form_error('alamat', '<div class="text-small text-danger">','</div>') ?>
        </div>

        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select name="gender" class="form-control" id="gender" required>
                <option value="Laki-laki" <?= ($user['gender'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki
                </option>
                <option value="Perempuan" <?= ($user['gender'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan
                </option>
            </select>
            <?php echo form_error('gender', '<div class="text-small text-danger">','</div>') ?>
        </div>


        <div class="form-group">
            <label for="no_telepon">No Telepon</label>
            <input type="text" name="no_telepon" class="form-control" id="no_telepon"
                value="<?= $user['no_telepon']; ?>" required>
            <?php echo form_error('no_telepon', '<div class="text-small text-danger">','</div>') ?>
        </div>

        <div class="form-group text-right">
            <button type="submit" class="btn btn-warning mt-4">Update</button>
            <a href="<?= base_url('admin/profil'); ?>" class="btn btn-danger mt-4">Batal</a>
        </div>

    </form>
</div>