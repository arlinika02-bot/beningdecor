<div class="container">
    <div class="card" style="margin-top: 50px; margin-bottom: 50px">
        <div class="card-header">
            Form Booking Dekorasi
        </div>

        <div class="card-body" style="font-size: 12px;">
            <?php foreach ($detail as $dt) : ?>
            <form method="POST" action="<?php echo base_url('pelanggan/booking_aksi') ?>">

                <div class="row">
                    <!-- Kolom Kanan -->
                    <div class="col-md-6 pe-md-4">
                        <div class="form-group mb-3">
                            <label>ID Pelanggan</label>
                            <input type="text" class="form-control"
                                value="<?php echo $this->session->userdata('id_user'); ?>" readonly>
                            <input type="hidden" name="id_user"
                                value="<?php echo $this->session->userdata('id_user'); ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label>Harga</label>
                            <input type="hidden" name="id_dekorasi" value="<?php echo $dt->id_dekorasi ?>">
                            <input type="text" id="harga" name="harga" class="form-control"
                                value="<?php echo $dt->harga ?>" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tgl. Booking</label>
                            <input type="date" name="tanggal_booking" class="form-control"
                                value="<?php echo date('Y-m-d'); ?>" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label>Nama Pasangan</label>
                            <input type="text" name="nama_pasangan" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Nama Ortu</label>
                            <input type="text" name="nama_ortu" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Nama Acara</label>
                            <input type="text" name="nama_acara" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Waktu Acara</label>
                            <input type="datetime-local" name="waktu_acara" class="form-control"
                                value="<?= isset($waktu_acara) ? $waktu_acara : '' ?>" required>
                        </div>



                    </div>

                    <!-- Kolom Kiri -->
                    <div class="col-md-6 ps-md-4">
                        <div class="form-group mb-3">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control"
                                value="<?php echo isset($user->alamat) ? $user->alamat : ''; ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_kabupaten">Kabupaten</label>
                            <select name="id_kabupaten" id="id_kabupaten" class="form-control" required>
                                <option value="">-- Pilih Kabupaten --</option>
                                <?php foreach ($kabupaten as $k) : ?>
                                <option value="<?= $k->id_kabupaten ?>"><?= $k->nama_kabupaten ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_kecamatan">Kecamatan</label>
                            <select name="id_kecamatan" id="id_kecamatan" class="form-control" required>
                                <option value="">-- Pilih Kecamatan --</option>
                                <!-- Akan terisi otomatis via JS -->
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Rekening</label>
                            <select name="id_rekening" class="form-control" required>
                                <option value="">-- Pilih Rekening --</option>
                                <?php foreach ($rekening as $rek) : ?>
                                <option value="<?= $rek->id_rekening ?>">
                                    <?= $rek->nama_bank ?> - <?= $rek->no_rekening ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Transport</label>
                            <input type="text" id="transport" name="transport" class="form-control" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label>Total</label>
                            <input type="text" id="total" name="total" class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-warning" style="font-size: 15px;">Booking</button>
                </div>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Saat kabupaten berubah
    $('#id_kabupaten').change(function() {
        var id_kabupaten = $(this).val();

        // Kosongkan kecamatan dan transport
        $('#id_kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
        $('#transport').val('');
        $('#total').val('');

        if (id_kabupaten !== '') {
            $.ajax({
                url: "<?= base_url('pelanggan/get_kecamatan_by_kabupaten') ?>",
                method: "POST",
                data: {
                    id_kabupaten: id_kabupaten
                },
                dataType: "json",
                success: function(data) {
                    $.each(data, function(index, value) {
                        $('#id_kecamatan').append('<option value="' + value
                            .id_kecamatan + '" data-transport="' + value
                            .transport + '">' + value.nama_kecamatan +
                            '</option>');
                    });
                }
            });
        }
    });

    // Saat kecamatan dipilih, isi transport dan hitung total
    $('#id_kecamatan').change(function() {
        var transport = $('option:selected', this).data('transport');
        $('#transport').val(transport);

        var harga = parseInt($('input[name="harga"]').val());
        var total = harga + parseInt(transport);
        $('#total').val(total);
    });
});
</script>