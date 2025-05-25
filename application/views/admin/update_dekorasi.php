<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Update Data Dekorasi</h1>
        </div>
        <div class="card">
            <div class="card-body">

                <?php foreach ($dekorasi as $dkr) : ?>
                <form method="POST" action="<?php echo base_url('Admin/edit_dekorasi') ?>"
                    enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <input type="hidden" name="id_dekorasi" value="<?php echo $dkr->id_dekorasi ?>">
                                <select name="kode_kategori" class="form-control">
                                    <option value="<?php echo $dkr->kode_kategori?>"><?php echo $dkr->kode_kategori?>
                                    </option>
                                    <?php foreach($kategori as $ktg) : ?>
                                    <option value="<?php echo $ktg->kode_kategori ?>"><?php echo $ktg->nama_kategori ?>
                                    </option>

                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('kode_kategori', '<div class="text-small text-danger">','</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Dekorasi</label>
                                <input type="text" name="nama_dekorasi" class="form-control"
                                    value="<?php echo $dkr->nama_dekorasi ?>">
                                <?php echo form_error('nama_dekorasi', '<div class="text-small text-danger">','</div>') ?>

                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control"
                                    value="<?php echo $dkr->keterangan ?>">
                                <?php echo form_error('keterangan', '<div class="text-small text-danger"> ','</div>') ?>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control"
                                    value="<?php echo $dkr->harga ?>">
                                <?php echo form_error('harga', '<div class="text-small text-danger"> ','</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option <?php if($dkr->status == "1") {echo "selected='selected'";}
                                        echo $dkr->status; ?> value="1">Tersedia</option>
                                    <option <?php if($dkr->status == "0") {echo "selected='selected'";}
                                        echo $dkr->status; ?> value="0">Tidak Tersedia</option>

                                </select>
                                <?php echo form_error('status', '<div class="text-small text-danger"> ','</div>') ?>
                            </div>


                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="form-control">


                            </div>

                            <div class="form-group text-right">

                                <button type="submit" class="btn btn-primary mt-4">Update</button>
                                <button type="reset" class="btn btn-danger mt-4">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>