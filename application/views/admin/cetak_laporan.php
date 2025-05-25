<body onload="window.print();">

    <h3 style="text-align:center">Laporan Transaksi Pemesanan Dekorasi</h3>
    <h4 style="text-align:center">Bening Anugrah Decoration</h4>
    <table>
        <tr>
            <td>Mulai Tanggal</td>
            <td>:</td>
            <td><?= date('d-m-Y', strtotime($this->input->get('mulai'))) ?></td>
        </tr>

        <tr>
            <td>Sampai Tanggal</td>
            <td>:</td>
            <td><?= date('d-m-Y', strtotime($this->input->get('sampai'))) ?></td>
        </tr>
    </table>

    <table class="table table-bordered table-striped mt-4">
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
            <?php $no=1; foreach ($transaksi as $tr) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= date('d/m/Y', strtotime($tr->tanggal_booking)) ?></td>
                <td><?= $tr->nama ?></td>
                <td><?= $tr->nama_acara ?></td>
                <td><?= $tr->waktu_acara ?></td>
                <td><?= $tr->alamat ?></td>
                <td><?= $tr->nama_dekorasi ?></td>
                <td>Rp. <?= number_format($tr->harga, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($tr->transport, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($tr->total, 0, ',', '.') ?></td>
                <td><?= $tr->nama_bank . ' - ' . $tr->no_rekening . ' - a.n. ' . $tr->nama_pemilik ?></td>
                <td><?= $tr->status_pembayaran == '0' ? 'Belum Lunas' : 'Lunas'; ?></td>
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
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7"><strong>Total Keseluruhan</strong></td>
                <td>Rp. <?= number_format($total_harga ?? 0, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($total_transport ?? 0, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($total_pemasukan ?? 0, 0, ',', '.') ?></td>
                <td colspan="3"></td>
            </tr>
        </tfoot>
    </table>