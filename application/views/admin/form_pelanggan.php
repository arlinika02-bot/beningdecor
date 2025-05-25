<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Input Data Pelanggan</h1>
        </div>
    </section>
    <form method="POST" action="<?php echo base_url('Admin/tambahpelanggan') ?>">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
            <?php echo form_error('nama', '<div class="text-small text-danger">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
            <?php echo form_error('alamat', '<div class="text-small text-danger">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender">
                <option value="">-- Pilih Gender --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <?php echo form_error('gender', '<div class="text-small text-danger">','</div>') ?>
        </div>
        <div class="form-group">
            <label>No. Telp/Whatsapp</label>
            <input type="text" name="no_telepon" class="form-control">
            <?php echo form_error('no_telepon', '<div class="text-small text-danger">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
            <?php echo form_error('email', '<div class="text-small text-danger">','</div>') ?>
        </div>



        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        <button type="reset" class="btn btn-danger mt-4">Reset</button>



    </form>
</div>