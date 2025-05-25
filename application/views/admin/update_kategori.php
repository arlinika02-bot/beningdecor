<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Update Kategori</h1>
        </div>
    </div>

    <?php foreach($kategori as $ktg) : ?>
    <form method="POST" action="<?php echo base_url('Admin/edit_kategori') ?>">

        <div class="form-group">
            <label>Kode Kategori</label>
            <input type="hidden" name="id_kategori" value="<?php echo $ktg->id_kategori ?>">
            <input type="text" name="kode_kategori" class="form-control" value="<?php echo $ktg->kode_kategori ?>">
            <?php echo form_error('kode_kategori', '<div class="text-small text-danger">','</div>') ?>

        </div>

        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" value="<?php echo $ktg->nama_kategori ?>">
            <?php echo form_error('nama_kategori', '<div class="text-small text-danger">','</div>') ?>

        </div>

        <div class=" form-group text-right">

            <button type="submit" class="btn btn-primary mt-4">Update</button>
            <button type="reset" class="btn btn-danger mt-4">Reset</button>
        </div>
    </form>
    <?php endforeach; ?>


</div>