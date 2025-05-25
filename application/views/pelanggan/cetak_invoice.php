<table style="width: 100%">
    <h3>Invoice Pembayaran</h3>
    <?php foreach ($transaksi as $tr) : ?>
    <tr>
        <td>Tgl. Booking</td>
        <td>:</td>
        <td><?php echo date('d/m/Y', strtotime($tr->tanggal_booking));?></td>
    </tr>

    <tr>
        <td>Waktu Acara</td>
        <td>:</td>
        <td><?php echo date('d/m/Y H:i', strtotime($tr->waktu_acara)); ?></td>
    </tr>

    <tr>
        <td>Nama Acara</td>
        <td>:</td>
        <td><?php echo $tr->nama_acara ?></td>
    </tr>

    <tr>
        <td>Nama Dekorasi</td>
        <td>:</td>
        <td><?php echo $tr->nama_dekorasi ?></td>
    </tr>

    <tr>
        <td>Harga</td>
        <td>:</td>
        <td><?php echo number_format($tr->harga,0,',','.') ?></td>
    </tr>

    <tr>
        <td>Transport</td>
        <td>:</td>
        <td><?php echo number_format($tr->transport,0,',','.') ?></td>
    </tr>

    <tr>
        <td>Transfer Ke Rek.</td>
        <td>:</td>
        <td><?php echo $tr->nama_bank . ' - ' . $tr->no_rekening . ' - a.n. ' . $tr->nama_pemilik ?>
        </td>
    </tr>
    <tr>
        <td>Status Pembayaran</td>
        <td>:</td>
        <td><?php if($tr->status_pembayaran == '0') {
            echo "Belum Lunas";
            } else {
            echo "Lunas";
            }
        ?>
        </td>
    <tr class="text-dark">
        <td><strong>JUMLAH PEMBAYARAN</strong></td>
        <td>:</td>
        <td><strong>Rp.
                <?php echo number_format($tr->harga + $tr->transport, 0, ',', '.'); ?></strong></td>
    </tr>
    </tr>

    <?php endforeach; ?>
</table>

<script type="text/javascript">
window.print();
</script>