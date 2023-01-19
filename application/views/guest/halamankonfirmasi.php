<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <?php if ($this->session->flashdata('pesan') !== null) : ?>
                <div class="alert alert success">
                    <?= $this->session->flashdata('pesan') ?>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    Konfirmasi Pembayaran
                </div>
                <div class="card-body">
                    <form action="<?= base_url('cekKonfirmasi') ?>" method="post">
                        <div class="form-group">
                            <label>Kode Booking</label>
                            <input name="kode" type="text" class="form-control" placeholder="Kode Booking">
                        </div>
                        <button class="btn btn-dark btn-block">Cek Kode Booking</button>
                    </form>
                </div>
            </div>
            <hr>
            <?php if (isset($_GET['kode'])) : ?>
                <div class="card">
                    <div class="card-header">
                        Detail Pembayaran Anda
                    </div>
                    <div class="card-body">
                        <h3 class="text-center">
                            <?php if ($no_tiket->status === '0') : ?>
                                <i class="fa fa-times text-danger"></i> Belum Melakukan Pembayaran
                            <?php else : ?>
                                <i class="fa fa-check text-success"></i> Pembayaran Sukses
                            <?php endif; ?>
                        </h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Identitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail as $dt) : ?>
                                        <tr>
                                            <td><?= $dt->nama ?></td>
                                            <td><?= $dt->no_identitas ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <p><b>Total Pembayaran Anda : </b> <b><?= 'Rp. ' . number_format($no_tiket->total_pembayaran, 0, ',', '.') ?> </b> </p>
                            <p class="text-danger">Silakan Kirim Bukti Pembayaran Anda Disini!</p>
                            <?= form_open_multipart('kirimKonfirmasi'); ?>
                            <input type="hidden" name="no_pembayaran" value="<?= $no_tiket->no_pembayaran ?>">
                            <input type="file" name="gambar" class="form-control">
                            <button type="submit" class="btn btn-outline-success mt-3 float-right">Kirim Bukti</button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>