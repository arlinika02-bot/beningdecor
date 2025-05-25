<div class="main-content">
    <section class="section" style="padding-top: 40px; padding-bottom: 40px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>My Profil</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th style="width: 150px;">Nama Lengkap</th>
                                            <td style="width: 30px;">:</td>
                                            <td><?= $user['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td>:</td>
                                            <td><?= $user['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>:</td>
                                            <td><?= $user['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>:</td>
                                            <td><?= $user['gender']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>No Telepon</th>
                                            <td>:</td>
                                            <td><?= $user['no_telepon']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>:</td>
                                            <td><?= $user['email']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center mt-4">
                                <a href="<?= base_url('pelanggan/dashboard'); ?>"
                                    class="btn btn-sm btn-warning mr-2">Kembali</a>
                                <a href="<?= base_url('pelanggan/update_profil'); ?>"
                                    class="btn btn-sm btn-success">Edit Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>