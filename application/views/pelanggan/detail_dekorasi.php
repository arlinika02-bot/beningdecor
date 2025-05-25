<div class="container mt-5 mb-5">
    <style>
    /* Menambahkan ukuran font kecil pada tabel dan isinya */
    .card-body {
        font-size: 16px;
    }

    .table th,
    .table td {
        font-size: 16px;
    }
    </style>
    <div class="card" style="margin-top: 50px">
        <div class="card-body">
            <?php foreach ($detail as $dt) :?>
            <div class="row">
                <div class="col-md-4">
                    <img style="width:90%" src="<?php echo base_url('assets/dekorasi/'.$dt->gambar)?>">
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <th>Nama Dekorasi</th>
                            <td><?php echo $dt->nama_dekorasi ?></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td><?php echo $dt->keterangan ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?php
                                if($dt->status == "0"){
                                    echo "Tidak Tersedia";
                                } else {
                                    echo "Tersedia";
                                }
                                ?></td>
                        </tr>

                        <td></td>
                        <td>
                            <?php if ($dt->status == "0"): ?>
                            <span class="btn btn-danger btn-sm" disabled>Telah DiBooking</span>
                            <?php else: ?>
                            <?= anchor('pelanggan/tambah_booking/' . $dt->id_dekorasi, '<button class="btn btn-warning btn-sm">Booking</button>') ?>
                            <?php endif; ?>
                        </td>
                    </table>

                </div>

            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>