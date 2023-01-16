<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css    ">
</head>

<body>

    <div class="container-fluid my-5">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">Daftar Jadwal</div>
                    <div class="col-md-12 mt-3">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Launch Modal</button>
                        <?= $this->session->flashdata('berhasil'); ?>
                    </div>
                    <div class="card-body">
                        <table class="table table-condesed table-hover" id="data">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kereta</th>
                                    <th>Asal</th>
                                    <th>Tujuan</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Tanggal Sampai</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $no = 1; ?>
                            <?php foreach ($jadwal as $jd) : ?>
                                <tbody>
                                    <td><?= $no++ ?></td>
                                    <td><?= $jd->nama_kereta ?></td>
                                    <td><?= $jd->ASAL ?></td>
                                    <td><?= $jd->TUJUAN ?></td>
                                    <td><?= $jd->tgl_berangkat ?></td>
                                    <td><?= $jd->tgl_sampai ?></td>
                                    <td><?= $jd->kelas ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/dashboard/edit-jadwal/' . $jd->id) ?>" class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="<?= base_url('hapusJadwal/' . $jd->id) ?>" class="delete btn btn-outline-danger btn-sm"><i class=" fa-solid fa-trash"></i></a>
                                    </td>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby=" exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('tambahJadwal') ?>">
                        <div class="form-group">
                            <label>Nama Kereta</label>
                            <input type="text" class="form-control" name="nama_kereta" placeholder="Nama Kereta" required>
                        </div>

                        <div class="form-group">
                            <label>Stasiun Asal</label>
                            <select name="asal" class="form-control" required>
                                <option value="">Stasiun Asal</option>
                                <?php foreach ($stasiun as $st) : ?>
                                    <option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Stasiun Tujuan</label>
                            <select name="tujuan" class="form-control" required>
                                <option value="">Stasiun Tujuan</option>
                                <?php foreach ($stasiun as $st) : ?>
                                    <option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Berangkat</label>
                            <input type="datetime-local" class="form-control" name="tgl_berangkat" min="<?= date('m-d-Y\TH:i:s') ?>" value="<?= date('m-d-Y\TH:i:s') ?>" placeholder="Tanggal Berangkat" required>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Sampai</label>
                            <input type="datetime-local" class="form-control" name="tgl_sampai" min="<?= date('m-d-Y\TH:i:s') ?>" value="<?= date('m-d-Y\TH:i:s') ?>" placeholder="Tanggal Berangkat" required>
                        </div>

                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="kelas" class="form-control" required>
                                <option value="Ekonomi">Ekonomi</option>
                                <option value="Eksekutif">Eksekutif</option>
                                <option value="Bisnis">Bisnis</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Jadwal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#data').DataTable();
    });
</script>