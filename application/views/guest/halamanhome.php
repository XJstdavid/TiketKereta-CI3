<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <br> <br> <br> <br>
                <h1 class="display-4">Selamat Datang Di XKereta</h1>
                <p class="lead">Website Pembelian Tiket Kereta Dengan Mudah.</p>
            </div>
            <div class="col-md-4">
                <form action="<?= base_url('cariTiket') ?>" method="post">
                    <div class="accordion-toggle">
                        <h6>PEMESANAN TIKET</h6>
                        <div class="form-group">
                            <label>Stasiun Asal</label>
                            <select name="asal" class="form-control theSelect">
                                <option disabled selected>Stasiun Asal</option>
                                <?php foreach ($stasiun as $st) : ?>
                                    <option value="<?= $st->id; ?>"><?= $st->nama_stasiun; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Stasiun Tujuan</label>
                            <select name="tujuan" class="form-control theSelect">
                                <option disabled selected>Stasiun Tujuan</option>
                                <?php foreach ($stasiun as $st) : ?>
                                    <option value="<?= $st->id; ?>"><?= $st->nama_stasiun; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Keberangkatan</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Penumpang</label>
                            <select name="jumlah" class="form-control">
                                <option disabled selected>Jumlah Penumpang</option>
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <option value="<?= $i ?>"><?= $i ?> Penumpang</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-success btn-block">Cari Tiket</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <hr>
    <?php if (!isset($tiket)) : ?>

    <?php else : ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="bg-primary text-white text-center">
                    <th>No</th>
                    <th>Nama Kereta</th>
                    <th>Tanggal Berangkat</th>
                    <th>Tanggal Sampai</th>
                    <th>Aksi</th>
                </thead>
                <tbody class="text-center">

                    <?php $no = 1; ?>
                    <?php foreach ($tiket as $tk) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $tk->nama_kereta ?></td>
                            <td><?php $date = date_create($tk->tgl_berangkat);
                                echo date_format($date, "d-m-Y H:i:s"); ?></td>
                            <td><?php $date = date_create($tk->tgl_sampai);
                                echo date_format($date, "d-m-Y H:i:s"); ?></td>
                            <td>
                                <a href="<?= base_url('pesan/' . $tk->id . '?p=' . $penumpang) ?>" class="btn btn-outline-success btn-sm">Pesan</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>