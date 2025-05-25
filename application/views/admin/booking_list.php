<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar List Status Booking & Pembayaran</h1>
        </div>
    </section>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>
                    <?php
                        switch($status_booking) {
                            case 0: echo "Belum Diterima"; break;
                            case 1: echo "Diterima"; break;
                            case 2: echo "Dikerjakan"; break;
                            case 3: echo "Selesai"; break;
                            default: echo "Tidak Diketahui";
                        }
                    ?>
                </h4>
                <h4>&
                    <?= ($status_pembayaran == '0') ? 'Belum Lunas' : (($status_pembayaran == '1') ? 'Lunas' : 'Tidak Diketahui'); ?>
                </h4>
            </div>

            <div class="card-body">
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tgl. Booking</th>
                                <th>Pelanggan</th>
                                <th>Nama Acara</th>
                                <th>Waktu Acara</th>
                                <th>Alamat</th>
                                <th>Dekorasi</th>
                                <th>Harga</th>
                                <th>Transport</th>
                                <th>Total</th>
                                <th>Transfer Bank</th>
                                <th>Status Pembayaran</th>
                                <th>Status Booking</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($transaksi)): ?>
                            <?php $no = 1; foreach ($transaksi as $tr): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d/m/Y', strtotime($tr->tanggal_booking)) ?></td>
                                <td><?= htmlspecialchars($tr->nama) ?></td>
                                <td><?= htmlspecialchars($tr->nama_acara) ?></td>
                                <td><?= htmlspecialchars($tr->waktu_acara) ?></td>
                                <td><?= htmlspecialchars($tr->alamat) ?></td>
                                <td><?= htmlspecialchars($tr->nama_dekorasi) ?></td>
                                <td>Rp. <?= number_format($tr->harga, 0, ',', '.') ?></td>
                                <td>Rp. <?= number_format($tr->transport, 0, ',', '.') ?></td>
                                <td>Rp. <?= number_format($tr->total, 0, ',', '.') ?></td>
                                <td><?= htmlspecialchars($tr->nama_bank) . ' - ' . htmlspecialchars($tr->no_rekening) . ' - a.n. ' . htmlspecialchars($tr->nama_pemilik) ?>
                                </td>
                                <td>
                                    <?= $tr->status_pembayaran == '0' ? '<span class="badge badge-warning">Belum Lunas</span>' : '<span class="badge badge-success">Lunas</span>' ?>
                                </td>
                                <td>
                                    <?php
                                            switch ($tr->status_booking) {
                                                case '0': echo '<span class="badge badge-secondary">Belum Diterima</span>'; break;
                                                case '1': echo '<span class="badge badge-info">Diterima</span>'; break;
                                                case '2': echo '<span class="badge badge-warning">Dikerjakan</span>'; break;
                                                case '3': echo '<span class="badge badge-success">Selesai</span>'; break;
                                                default: echo '<span class="badge badge-dark">Tidak Diketahui</span>';
                                            }
                                        ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="13" class="text-center">Tidak ada data booking dengan status dan pembayaran
                                    ini.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer">
                <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
                    Kembali</a>
            </div>
        </div>
    </div>
</div>