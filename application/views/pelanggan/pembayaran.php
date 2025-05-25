<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card" style="margin-top:50px">
                <div class="card-header alert alert-success">
                    Invoice Pembayaran
                </div>
                <div class="card-body">
                    <table class="table">
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


                        <tr class="text-dark">
                            <td><strong>JUMLAH PEMBAYARAN</strong></td>
                            <td>:</td>
                            <td><strong>Rp.
                                    <?php echo number_format($tr->harga + $tr->transport, 0, ',', '.'); ?></strong></td>
                        </tr>

                        <?php endforeach; ?>
                    </table>
                    <a href="<?php echo base_url('pelanggan/cetak_invoice/'.$tr->id_booking)?>"
                        class="btn btn-sm btn-success mt-2 text-center"><i class="fas fa-print"></i> Print Invoice</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="class">
                <div class="card-header alert alert-primary" style="margin-top: 50px">
                    Informasi Pembayaran
                </div>
                <div class="card-body">
                    <?php
                    if(empty($tr->bukti_pembayaran)) { ?>
                    <button style="width:100%" type="button" class="btn btn-sm btn-danger mt-3" data-toggle="modal"
                        data-target="#exampleModal">
                        Upload Bukti Pembayaran
                    </button>

                    <?php }elseif($tr->status_pembayaran == '0'){?>
                    <button style="width:100%" class="btn btn-sm btn-warning"><i clas="fa fa-clock-o"></i>Menunggu
                        Konfirmasi</button>
                    <?php }elseif($tr->status_pembayaran == '1'){ ?>
                    <button style="width:100%" class="btn btn-sm btn-success"><i clas="fa fa-clock-o"></i>Pembayaran
                        Selesai</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal untuk upload bukti pembayaran -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload bukti pembayaran anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="<?php echo base_url('pelanggan/pembayaran_aksi/' . $tr->id_booking); ?>"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label></label>
                        <input type="hidden" name="id_booking" class="form-control"
                            value="<?php echo $tr->id_booking ?>">
                        <input type="file" name="bukti_pembayaran" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>