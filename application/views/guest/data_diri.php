<div class="container my-4">
    <div class="card">
        <div class="card-header bg-primary text-white">Info Perjalanan</div>

        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-2">
                    <label>Nama Kereta</label>
                </div>
                <div class="col-md-10">
                    <?= $info->nama_kereta ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label>Waktu Berangkat</label>
                </div>
                <div class="col-md-10">
                    <?= format_indo(date(($info->tgl_berangkat))); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label>Waktu Tiba</label>
                </div>
                <div class="col-md-10">
                    <?= format_indo(date(($info->tgl_sampai))); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label>Rute</label>
                </div>
                <div class="col-md-10">
                    <?= $info->ASAL ?>
                    <span>-</span>
                    <?= $info->TUJUAN    ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label>Jumlah Penumpang</label>
                </div>
                <div class="col-md-10">
                    <?= $_GET['p'] ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label>Harga Per Tiket</label>
                </div>
                <div class="col-md-10">
                    <?= 'Rp. ' . number_format($info->harga, 0, ',', '.') ?>
                </div>
            </div>
        </div>
    </div>
    <form action="<?= base_url('pesanTiket') ?>" method="post">
        <input type="hidden" name="penumpang" value="<?= $_GET['p'] ?>">
        <input type="hidden" name="id_jadwal" value="<?= $id_jadwal  ?>">
        <input type="hidden" name="harga" value="<?= $info->harga  ?>">

        <div class="card my-3">
            <div class="card-header bg-primary text-white">Detail Penumpang</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th style="color: red;">>= 17 tahun nomor ID(KTP,SIM,Pasport)*</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i <= $_GET['p']; $i++) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <input type="text" class="form-control" name="nama<?= $i ?>" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="identitas<?= $i ?>" required>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card my-3">
            <div class="card-header bg-primary text-white">Data Pemesan</div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama Pemesan" name="nama_pemesan" required>
                    </div>
                    <div class="col">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="EmaiL Pemesan" name="email" required>
                    </div>
                    <div class="col">
                        <label>No Telp</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">+62</span>
                            <input type="number" class="form-control" placeholder="No Telp Pemesan" name="no_telp" required>
                        </div>
                    </div>
                </div>
                <div class="clearfix my-3">
                    <div class="form-group">
                        <label for="inputAddress">Alamat</label>
                        <textarea name="alamat" class="form-control" placeholder="Alamat Pemesan" required></textarea>
                    </div>
                </div>
                <button class="btn btn-outline-success float-right">Simpan</button>
            </div>
        </div>
        <label class="text-danger">Ketentuan Reservasi Tiket Kereta Api</label>
        <div class="card border-warning text-warning">
            <div class="card-body">
                <ol>
                    <li style="color: black;">Reservasi dapat dilakukan 3 jam sebelum kereta berangkat.</li>
                    <li style="color: black;">Harga dan ketersediaan tempat duduk sewaktu-waktu dapat berubah.</li>
                </ol>
            </div>
        </div>
    </form>
</div>