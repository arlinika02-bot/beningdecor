<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Tambah Kategori</h1>
        </div>
    </div>

    <form method="POST" action="<?php echo base_url('Admin/tambahkategori') ?>">

        <div class="form-group">
            <label>Kode Kategori</label>
            <input type="text" name="kode_kategori" class="form-control">
            <?php echo form_error('kode_kategori', '<div class="text-small text-danger">','</div>') ?>

        </div>

        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control">
            <?php echo form_error('nama_kategori', '<div class="text-small text-danger">','</div>') ?>

        </div>

        <div class="form-group text-right">

            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
            <button type="reset" class="btn btn-danger mt-4">Reset</button>
        </div>
    </form>


</div>