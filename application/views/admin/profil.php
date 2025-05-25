<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profil Admin</h1>
        </div>

        <div class="section-body container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <?php
                                $fields = [
                                    'Nama Lengkap'   => $user['nama'],
                                    'Username'       => $user['username'],
                                    'Alamat'         => $user['alamat'],
                                    'Jenis Kelamin'  => $user['gender'],
                                    'No Telepon'     => $user['no_telepon'],
                                ];
                            ?>
                            <div class="mb-3">
                                <?php foreach ($fields as $label => $value): ?>
                                <div class="d-flex flex-wrap mb-2">
                                    <div class="me-2" style="min-width: 140px; font-weight: 500;"><?= $label ?></div>
                                    <div class="me-2">:</div>
                                    <div class="flex-grow-1"><?= $value ?></div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="text-center mt-3">
                                <a href="<?= base_url('admin/dashboard'); ?>" class="btn btn-sm btn-danger">Kembali</a>
                                <a href="<?= base_url('admin/update_profil'); ?>" class="btn btn-sm btn-warning">Edit
                                    Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>