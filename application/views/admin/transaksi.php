<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Transaksi</h1>
        </div>

        <span class="mt-2 p-2"><?php echo $this->session->flashdata('pesan')?></span>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-striped text-dark w-100 mb-4">
                    <thead class="table-primary">
                        <tr>
                            <th colspan="3">Informasi Pelanggan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 150px;"><strong>Nama</strong></td>
                            <td style="width: 10px;">:</td>
                            <td><?= $transaksi->nama ?></td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
                            <td>:</td>
                            <td><?= $transaksi->alamat ?></td>
                        </tr>
                        <tr>
                            <td><strong>Kecamatan</strong></td>
                            <td>:</td>
                            <td><?= $transaksi->nama_kecamatan ?></td>
                        </tr>
                        <tr>
                            <td><strong>Kabupaten</strong></td>
                            <td>:</td>
                            <td><?= $transaksi->nama_kabupaten ?></td>
                        </tr>
                        <tr>
                            <td><strong>No Telp</strong></td>
                            <td>:</td>
                            <td><?= $transaksi->no_telepon ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Detail Pemesanan -->
                <table class="table table-bordered table-striped text-center w-100 mb-4">
                    <thead class="table-primary">
                        <tr>
                            <th colspan="6">Detail Pemesanan</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>Nama Dekorasi</th>
                            <th>Harga</th>
                            <th>Transport</th>
                            <th>Total</th>
                            <th>Transfer Ke Rek.</th>
                            <th>Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $transaksi->nama_dekorasi ?></td>
                            <td>Rp. <?= number_format($transaksi->harga, 0, ',', '.') ?></td>
                            <td>Rp. <?= number_format($transaksi->transport, 0, ',', '.') ?></td>
                            <td>Rp. <?= number_format($transaksi->total, 0, ',', '.') ?></td>
                            <td><?= $transaksi->nama_bank . ' - ' . $transaksi->no_rekening . ' - a.n. ' . $transaksi->nama_pemilik ?>
                            </td>
                            <td><?= $transaksi->status_pembayaran == '0' ? 'Belum Lunas' : 'Lunas'; ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Keterangan -->
                <table class="table table-bordered table-striped text-center w-100">
                    <thead class="table-primary">
                        <tr>
                            <th colspan="4">Keterangan</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>Nama Pasangan</th>
                            <th>Nama Orang Tua</th>
                            <th>Nama Acara</th>
                            <th>Waktu Acara</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $transaksi->nama_pasangan ?></td>
                            <td><?= $transaksi->nama_ortu ?></td>
                            <td><?= $transaksi->nama_acara ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($transaksi->waktu_acara)) ?></td>
                        </tr>
                    </tbody>
                </table>

                <div class="form-group text-right">
                    <a href="<?= base_url('admin/transaksi'); ?>" class="btn btn-primary mt-3">Kembali</a>
                </div>

            </div> <!-- end table-responsive -->
        </div>
    </section>
</div>