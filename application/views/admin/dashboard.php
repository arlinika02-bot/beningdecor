<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pelanggan</h4>
                        </div>
                        <div class="card-body">
                            <?= $total_user ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="far fa-solid fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Kategori</h4>
                        </div>
                        <div class="card-body">
                            <?= $total_kategori ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-image"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Dekorasi</h4>
                        </div>
                        <div class="card-body">
                            <?= $total_dekorasi ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-secondary">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Transaksi</h4>
                        </div>
                        <div class="card-body">
                            <?= $total_transaksi ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="<?= base_url('admin/bookingByStatusAndPayment/0/0') ?>" style="text-decoration:none;">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-dark">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Belum Diterima</h4>
                            </div>
                            <div class="card-body">
                                <?= $belum_diterima ?>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="<?= base_url('admin/bookingByStatusAndPayment/1/0') ?>" style="text-decoration:none;">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-clipboard"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Diterima Belum Bayar</h4>
                            </div>
                            <div class="card-body">
                                <?= $diterima_belum_bayar ?>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="<?= base_url('admin/bookingByStatusAndPayment/1/1') ?>" style="text-decoration:none;">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Diterima Sudah Bayar</h4>
                            </div>
                            <div class="card-body">
                                <?= $diterima_sudah_bayar ?>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="<?= base_url('admin/bookingByStatusAndPayment/2/1') ?>" style="text-decoration:none;">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Sedang Dikerjakan</h4>
                            </div>
                            <div class="card-body">
                                <?= $dikerjakan ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
</div>