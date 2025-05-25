<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Tambah Data Admin</h1>
        </div>
    </section>

    <form method="POST" action="<?php echo base_url('admin/tambahadmin') ?>">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>">
            <?php echo form_error('nama', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo set_value('username') ?>">
            <?php echo form_error('username', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo set_value('alamat') ?>">
            <?php echo form_error('alamat', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender">
                <option value="">-- Pilih Gender --</option>
                <option value="Laki-laki" <?php echo set_select('gender', 'Laki-laki') ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo set_select('gender', 'Perempuan') ?>>Perempuan</option>
            </select>
            <?php echo form_error('gender', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
            <label>No. Telp/Whatsapp</label>
            <input type="text" name="no_telepon" class="form-control" value="<?php echo set_value('no_telepon') ?>">
            <?php echo form_error('no_telepon', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo set_value('email') ?>">
            <?php echo form_error('email', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <?php echo form_error('password', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary mt-4">Tambah</button>
            <button type="reset" class="btn btn-danger mt-4">Reset</button>
        </div>
    </form>
</div>