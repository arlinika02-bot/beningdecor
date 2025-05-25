<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Transaksi Pemesanan</h1>
        </div>
    </section>

    <form method="POST" action="<?= base_url('admin/laporan') ?>">
        <div class="row align-items-end">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Mulai Tanggal</label>
                    <input type="date" name="mulai" class="form-control" value="<?= set_value('mulai', $mulai ?? '') ?>"
                        required>
                    <?= form_error('mulai', '<span class="text-small text-danger">', '</span>') ?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input type="date" name="sampai" class="form-control"
                        value="<?= set_value('sampai', $sampai ?? '') ?>" required>
                    <?= form_error('sampai', '<span class="text-small text-danger">', '</span>') ?>
                </div>
            </div>


            <div class="col-md-2">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-eye">Tampilkan</i>
                    </button>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <a class="btn btn-dark btn-block"
                        href="<?= base_url('admin/cetak_laporan?mulai=' . set_value('mulai', $mulai ?? '') . '&sampai=' . set_value('sampai', $sampai ?? '') . '&status=' . set_value('status', $status ?? '')) ?>"
                        target="_blank">
                        <i class="fas fa-print"></i> Cetak
                    </a>
                </div>
            </div>
        </div>
    </form>


    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
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

            <?php $no = 1; foreach ($transaksi as $tr) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo date('d/m/Y', strtotime($tr->tanggal_booking)); ?></td>
                <td><?php echo $tr->nama ?></td>
                <td><?php echo $tr->nama_acara ?></td>
                <td><?php echo $tr->waktu_acara ?></td>
                <td><?php echo $tr->alamat ?></td>
                <td><?php echo $tr->nama_dekorasi ?></td>
                <td>Rp. <?php echo number_format($tr->harga, 0, ',', '.') ?></td>
                <td>Rp. <?php echo number_format($tr->transport, 0, ',', '.') ?></td>
                <td>Rp. <?php echo number_format($tr->total, 0, ',', '.') ?></td>
                <td><?php echo $tr->nama_bank . ' - ' . $tr->no_rekening . ' - a.n. ' . $tr->nama_pemilik ?></td>
                <td><?php echo $tr->status_pembayaran == '0' ? 'Belum Lunas' : 'Lunas'; ?></td>
                <td>
                    <?php
                            switch ($tr->status_booking) {
                                case '0': echo 'Belum Diterima'; break;
                                case '1': echo 'Diterima'; break;
                                case '2': echo 'Dikerjakan'; break;
                                case '3': echo 'Selesai'; break;
                                default: echo 'Tidak Diketahui';
                            }
                        ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>