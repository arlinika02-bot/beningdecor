<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Update Rekening</h1>
        </div>
    </div>

    <?php foreach($rekening as $rek) : ?>
    <form method="POST" action="<?php echo base_url('admin/edit_rekening') ?>">
        <!-- Tambahkan hidden field untuk ID -->
        <input type="hidden" name="id_rekening" value="<?php echo $rek->id_rekening ?>">

        <div class="form-group">
            <label>No. Rekening</label>
            <input type="number" name="no_rekening" class="form-control"
                value="<?php echo set_value('no_rekening', $rek->no_rekening) ?>">
            <?php echo form_error('no_rekening', '<div class="text-small text-danger">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Nama Bank</label>
            <input type="text" name="nama_bank" class="form-control"
                value="<?php echo set_value('nama_bank', $rek->nama_bank) ?>">
            <?php echo form_error('nama_bank', '<div class="text-small text-danger">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik" class="form-control"
                value="<?php echo set_value('nama_pemilik', $rek->nama_pemilik) ?>">
            <?php echo form_error('nama_pemilik', '<div class="text-small text-danger">','</div>') ?>
        </div>

        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary mt-4">Update</button>
            <button type="reset" class="btn btn-danger mt-4">Reset</button>
        </div>
    </form>
    <?php endforeach; ?>
</div>