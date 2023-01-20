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
                <h4>Kode Booking : <?= $_GET['kode'] ?></h4>
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        Detail Pembayaran Anda
                    </div>
                    <div class="card-body">
                        <h3 class="text-center">
                            <?php if ($no_tiket->status === '0') : ?>
                                <i class="fa fa-times text-danger"></i> Belum Melakukan Pembayaran
                            <?php elseif ($no_tiket->status === '1') : ?>
                                <i class="fa fa-hourglass-half text-warning"></i></i> Pembayaran Menunggu Verikasi
                            <?php elseif ($no_tiket->status === '2') : ?>
                                <i class="fa fa-check text-success"></i> Pembayaran Telah Di Verikasi
                            <?php endif; ?>
                        </h3>
                        <?php if ($this->session->flashdata('alert') !== null) : ?>

                            <?= $this->session->flashdata('alert'); ?>


                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Identitas</th>
                                        <th>Gerbong</th>
                                        <th>Bagian</th>
                                        <th>Kursi</th>
                                        <?php if ($no_tiket->status !== '2') : ?>
                                            <th>Aksi</th>
                                        <?php else : endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail as $dt) : ?>
                                        <tr>
                                            <td><?= $dt->nama ?></td>
                                            <td><?= $dt->no_identitas ?></td>
                                            <td><?= $dt->gerbong ?></td>
                                            <td><?= $dt->bagian ?></td>
                                            <td><?= $dt->kursi ?></td>
                                            <?php if ($no_tiket->status !== '2') : ?>
                                                <td>
                                                    <?php if ($dt->gerbong === null || $dt->bagian === null || $dt->kursi === null) : ?>
                                                        <a class="btn btn-sm btn-outline-warning" href="" data-toggle="modal" data-target="#pilihGerbong<?= $dt->id ?>">Pilih</a>
                                                    <?php else : ?>
                                                        <a class="btn btn-sm btn-outline-info ml-2" href="" data-toggle="modal" data-target="#gantiGerbong<?= $dt->id ?>">Ganti</a>
                                                    <?php endif; ?>
                                                </td>
                                            <?php else : endif; ?>
                                        </tr>

                                        <?php if ($dt->gerbong !== null && $dt->kursi !== null && $dt->bagian !== null) : ?>

                                            <!-- Modal  Ganti -->
                                            <div class="modal fade" id="gantiGerbong<?= $dt->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ganti </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form action="<?= base_url('PilihGerbong') ?>" method="post">
                                                            <input type="hidden" name="kode" value="<?= $_GET['kode'] ?>">
                                                            <input type="hidden" name="nama" value="<?= $dt->nama ?>">

                                                            <div class="modal-body">

                                                                <img class="img-fluid mb-3 img_gerbong" style="width: 400px; display: block; margin-left: auto; margin-right: auto;">

                                                                <div class="form-group">
                                                                    <select class="form-control mt-3 theSelect select_gerbong" name="gerbong" required>
                                                                        <option value="0">Pilih Gerbong Anda</option>

                                                                        <?php for ($i = 1; $i <= 3; $i++) : ?>
                                                                            <?php

                                                                            if ($dt->gerbong == $i) :
                                                                                $select = 'selected';
                                                                            else :
                                                                                $select = '';
                                                                            endif;
                                                                            ?>

                                                                            <option <?= $select ?> value="<?= $i ?>">Gerbong <?= $i ?></option>

                                                                        <?php endfor; ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <select class="form-control theSelect bagian" name="bagian" onchange="cekBagian()" required>
                                                                        <option value="0">Pilih Bagian</option>

                                                                        <?php for ($i = 'a'; $i <= 'b'; $i++) : ?>
                                                                            <?php

                                                                            if ($dt->bagian === $i) :
                                                                                $select = 'selected';
                                                                            else :
                                                                                $select = '';
                                                                            endif;
                                                                            ?>

                                                                            <option <?= $select ?> value="<?= $i ?>">Bagian <?= $i ?></option>

                                                                        <?php endfor; ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <select class="form-control theSelect bagian_a" name="kursi" required>
                                                                        <?php for ($i = 1; $i <= 29; $i++) : ?>

                                                                            <?php
                                                                            if ($dt->kursi == $i) :
                                                                                $select = 'selected';
                                                                            else :
                                                                                $select = '';
                                                                            endif;
                                                                            ?>

                                                                            <option <?= $select ?> value="<?= $i ?>"> <?= $i ?></option>
                                                                        <?php endfor; ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <select class="form-control theSelect bagian_b" name="kursi" required>
                                                                        <?php for ($i = 1; $i <= 20; $i++) : ?>

                                                                            <?php
                                                                            if ($dt->kursi == $i) :
                                                                                $select = 'selected';
                                                                            else :
                                                                                $select = '';
                                                                            endif;
                                                                            ?>

                                                                            <option <?= $select ?> value="<?= $i ?>"> <?= $i ?></option>
                                                                        <?php endfor; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Ganti Gerbong</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php else : ?>

                                            <!-- Modal  Pilih -->
                                            <div class="modal fade" id="pilihGerbong<?= $dt->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Pilih </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <form action="<?= base_url('PilihGerbong') ?>" method="post">
                                                            <input type="hidden" name="kode" value="<?= $_GET['kode'] ?>">
                                                            <input type="hidden" name="nama" value="<?= $dt->nama ?>">
                                                            <div class="modal-body">

                                                                <img class="img-fluid mb-3 img_gerbong" src="" style="width: 400px; display: block; margin-left: auto; margin-right: auto;">

                                                                <div class="form-group">
                                                                    <select class="form-control mt-3 theSelect select_gerbong" name="gerbong" onchange="cekGerbong()" required>
                                                                        <option selected value="0">Pilih Gerbong Anda</option>
                                                                        <option value="1">Gerbong 1</option>
                                                                        <option value="2">Gerbong 2</option>
                                                                        <option value="3">Gerbong 3</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <select class="form-control theSelect bagian" name="bagian" onchange="cekBagian()" required>
                                                                        <option selected value="0">Pilih Bagian</option>
                                                                        <option value="a">A</option>
                                                                        <option value="b">B</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <select class="form-control theSelect bagian_a" name="kursi" required>
                                                                        <option disabled selected>Pilih No Kursi</option>
                                                                        <?php for ($i = 1; $i <= 29; $i++) : ?>
                                                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                                                        <?php endfor; ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <select class="form-control theSelect bagian_b" name="kursi" required>
                                                                        <option disabled selected>Pilih No Kursi</option>
                                                                        <?php for ($i = 1; $i <= 20; $i++) : ?>
                                                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                                                        <?php endfor; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Pilih Gerbong</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <p><b>Total Pembayaran Anda : </b> <b><?= 'Rp. ' . number_format($no_tiket->total_pembayaran, 0, ',', '.') ?> </b> </p>

                            <?php if ($no_tiket->status === '2') : ?>
                                <form action="<?= base_url('print') ?>" method="post">
                                    <input type="hidden" name="no_tiket" value="<?= $no_tiket->no_tiket ?>">
                                    <button type="submit" class="btn btn-outline-info float-right"><i class="fa fa-print"></i></button>
                                </form>
                            <?php endif; ?>

                            <?php if ($no_tiket->status === '0') : ?>
                                <?= form_open_multipart('kirimKonfirmasi') ?>
                                <input type="hidden" name="no_pembayaran" value="<?= $no_tiket->no_pembayaran ?>">

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