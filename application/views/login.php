<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img src="<?php echo base_url('assets/assets_stisla/') ?>/assets/img/logo.png" alt="logo"
                        width="100" class="shadow-light rounded-circle">
                </div>

                <div class="card card-primary">
                    <span class="m-2"><?php echo $this->session->flashdata('pesan') ?></span>
                </div>

                <div class="card-body">
                    <form method="POST" action="<?php echo base_url('Auth/login')?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" name="username" autofocus>
                            <?php echo form_error('username', '<div class="text-small text-danger">','</div>') ?>
                        </div>
                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control" name="password">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                                        <i class="fa fa-eye" id="toggleIcon"></i>
                                    </span>
                                </div>
                            </div>
                            <?php echo form_error('password', '<div class="text-small text-danger">','</div>') ?>
                        </div>
                        <div class="float-right">

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Login
                            </button>
                            <a href="<?php echo base_url('home/dashboard'); ?>" class="btn btn-dark btn-lg btn-block">
                                Home
                            </a>

                        </div>

                        <div class="mt-5 text-muted text-center">
                            Belum memiliki akun? <a href="<?php echo base_url('register') ?>">Buat Akun!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const icon = document.getElementById('toggleIcon');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>