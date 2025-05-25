<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Tambah Rekening</h1>
        </div>
    </div>

    <form method="POST" action="<?php echo base_url('Admin/tambahrekening') ?>">

        <div class="form-group">
            <label>No. rekening</label>
            <input type="number" name="no_rekening" class="form-control">
            <?php echo form_error('no_rekening', '<div class="text-small text-danger">','</div>') ?>

        </div>

        <div class="form-group">
            <label>Nama Bank</label>
            <input type="text" name="nama_bank" class="form-control">
            <?php echo form_error('nama_bank', '<div class="text-small text-danger">','</div>') ?>

        </div>
        <div class="form-group">
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik" class="form-control">
            <?php echo form_error('nama_pemilik', '<div class="text-small text-danger">','</div>') ?>

        </div>

        <div class="form-group text-right">

            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
            <button type="reset" class="btn btn-danger mt-4">Reset</button>
        </div>
    </form>


</div>