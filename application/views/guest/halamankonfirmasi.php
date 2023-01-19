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
                    <div class="card-header bg-primary text-white text-center">
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
                            <?php if ($no_tiket->status === '0') : ?>
                                <?= form_open_multipart('kirimKonfirmasi') ?>
                                <input type="hidden" name="no_pembayaran" value="<?= $no_tiket->no_pembayaran ?>">

                                <img id="img_gerbong" class="img-fluid mb-3" src="" style="width: 400px; display: block; margin-left: auto; margin-right: auto;">

                                <div class="form-group">
                                    <select class="form-control mt-3 theSelect" name="gerbong" id="select_gerbong" onchange="cekGerbong()" required>
                                        <option selected value="0">Pilih Gerbong Anda</option>
                                        <option value="1">Gerbong 1</option>
                                        <option value="2">Gerbong 2</option>
                                        <option value="3">Gerbong 3</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control theSelect" name="bagian" id="bagian" onchange="cekBagian()" required>
                                        <option selected value="0">Pilih Bagian</option>
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control theSelect" name="kursi" id="bagian_a" required>
                                        <option disabled selected>Pilih No Kursi</option>
                                        <?php for ($i = 1; $i <= 29; $i++) : ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control theSelect" name="kursi" id="bagian_b" required>
                                        <option disabled selected>Pilih No Kursi</option>
                                        <?php for ($i = 1; $i <= 20; $i++) : ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <br>

                                <label class="text-danger">Silakan Kirim Bukti Pembayaran Anda Disini!</label>
                                <input id="foto" type="file" name="gambar" class="form-control mt-2" required>
                                <p class="d-none mt-3" id="pesan"></p>
                                <button id="btn_konfirmasi" type="submit" class="btn btn-outline-success mt-4 btn-block">Kirim Bukti</button>
                                <?= form_close(); ?>
                            <?php else : ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>