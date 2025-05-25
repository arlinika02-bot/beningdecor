<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img src="<?php echo base_url('assets/assets_stisla/') ?>assets/img/logo.png" alt="logo" width="100"
                        class="shadow-light rounded-circle">
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h5>Change Password</h5>
                    </div>

                    <!-- Menampilkan pesan flashdata jika ada -->
                    <span class="m-2">
                        <?php echo $this->session->flashdata('pesan'); ?>
                    </span>

                    <div class="card-body">
                        <form method="POST" action="<?php echo base_url('Auth/ganti_password_aksi') ?>">
                            <div class="form-group">
                                <label for="password_baru">Password Baru</label>
                                <input id="password_baru" type="password" class="form-control" name="password_baru"
                                    tabindex="1" autofocus>
                                <?php echo form_error('password_baru', '<div class="text-small text-danger mt-1">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <label for="ulangi_password" class="control-label">Ulangi Password</label>
                                <input id="ulangi_password" type="password" class="form-control" name="ulangi_password"
                                    tabindex="2">
                                <?php echo form_error('ulangi_password', '<div class="text-small text-danger mt-1">','</div>') ?>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Change Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>