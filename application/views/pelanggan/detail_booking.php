<div class="container">
    <div class="card mx-auto" style="margin-top: 50px; width:90%">
        <div class="card-header">
            <h4>Detail Booking</h4>
        </div>

        <?php if ($this->session->flashdata('pesan')): ?>
        <div class="alert alert-success mt-2 p-2">
            <?= $this->session->flashdata('pesan') ?>
        </div>
        <?php endif; ?>

        <div class="card-body">
            <div class="table-responsive-md">
                <?php if ($transaksi): ?>

                <!-- Informasi Pelanggan -->
                <table class="table table-bordered table-striped">
                    <thead class="table-success">
                        <tr>
                            <th colspan="2">Informasi Pelanggan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Nama</strong></td>
                            <td><?= $transaksi->nama ?></td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
                            <td><?= $transaksi->alamat ?></td>
                        </tr>
                        <tr>
                            <td><strong>Kecamatan</strong></td>
                            <td><?= $transaksi->nama_kecamatan ?></td>
                        </tr>
                        <tr>
                            <td><strong>Kabupaten</strong></td>
                            <td><?= $transaksi->nama_kabupaten ?></td>
                        </tr>
                        <tr>
                            <td><strong>No Telp</strong></td>
                            <td><?= $transaksi->no_telepon ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Detail Pemesanan -->
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-success">
                        <tr>
                            <th colspan="6">Detail Pemesanan</th>
                        </tr>
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
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-success">
                        <tr>
                            <th colspan="4">Keterangan</th>
                        </tr>
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

                <?php else: ?>
                <div class="alert alert-warning">Data transaksi tidak ditemukan.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>