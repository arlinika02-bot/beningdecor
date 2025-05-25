<div class="container">
    <div class="card mx-auto" style="margin-top: 50px; width:90%">
        <div class="card-header">
            <h4>My Transaksi</h4>
        </div>

        <span class="mt-2 p-2"><?php echo $this->session->flashdata('pesan')?></span>
        <div class="card-body">
            <div class="table-responsive-md">
                <table class="table table-bordered table-striped small-text text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl. Transaksi</th>
                            <th>Dekorasi</th>
                            <th>Nama Acara</th>
                            <th>Waktu Acara</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($transaksi as $tr) : ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo date('d/m/Y', strtotime($tr->tanggal_booking)); ?></td>
                            <td><?php echo $tr->nama_dekorasi?></td>
                            <td><?php echo $tr->nama_acara?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($tr->waktu_acara)); ?></td>

                            <!-- Payment button hanya muncul jika status_booking 1,2,3 -->
                            <td class="text-center">
                                <?php if (in_array($tr->status_booking, ['1', '2', '3'])) : ?>
                                <a href="<?= base_url('pelanggan/pembayaran/' . $tr->id_booking) ?>"
                                    class="btn btn-sm btn-success" title="Bayar">
                                    <i class="fas fa-check-circle"></i>
                                </a>
                                <?php else: ?>
                                <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php
                                $status = $tr->status_booking;
                                switch ($status) {
                                    case '0':
                                        echo '<button class="btn btn-warning btn-sm" disabled>Belum Diterima</button>';
                                        break;
                                    case '1':
                                        echo '<button class="btn btn-primary btn-sm" disabled>Diterima</button>';
                                        break;
                                    case '2':
                                        echo '<button class="btn btn-info btn-sm" disabled>Dikerjakan</button>';
                                        break;
                                    case '3':
                                        echo '<button class="btn btn-success btn-sm" disabled>Selesai</button>';
                                        break;
                                    default:
                                        echo '<button class="btn btn-secondary btn-sm" disabled>Status Tidak Diketahui</button>';
                                        break;
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php if ($tr->status_booking == '0' || $tr->status_pembayaran == '0'): ?>
                                <a onclick="return confirm('Yakin akan membatalkan ini?')"
                                    href="<?= base_url('pelanggan/batal_transaksi/' . $tr->id_booking) ?>"
                                    class="btn btn-sm btn-danger">
                                    <i class="fas fa-times-circle"></i>
                                </a>
                                <?php endif; ?>

                                <!-- Tombol Detail selalu tampil -->
                                <a href="<?= base_url('pelanggan/detail_booking/' . $tr->id_booking) ?>"
                                    class="btn btn-sm btn-primary mb-1" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.small-text td,
.small-text th {
    font-size: 0.85rem;
}

.text-center {
    text-align: center;
}

table td .btn {
    margin: 5px 0;
}
</style>