<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?> | Kelola Jadwal</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/costum.css') ?>">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bx-train'></i>
            <span class="logo_name">X-Kereta</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="<?= base_url('admin/dashboard') ?>">
                    <i class='bx bx-home'></i>
                    <span class="link_name">Home</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="#">
                        <i class='bx bxs-data'></i>
                        <span class="link_name">Kelola Data</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="<?= base_url('admin/dashboard/kelola-jadwal') ?>">Jadwal</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="https://github.com/Sacsam005/dropdown-menu/blob/master/image/profile.png?raw=true" alt="profileImg">
                    </div>
                    <div class="name-job">
                        <div class="profile_name">Logout</div>
                    </div>
                    <i class='bx bx-log-out'></i>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Kelola Jadwal</span>
        </div>
        <div class="container-fluid my-5">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center">Daftar Jadwal</div>
                        <div class="col-md-12 mt-3">
                            <button type="button" class="btn btn-outline-warning float-right" data-toggle="modal" data-target="#exampleModal">
                                Tambah Data Stasiun
                            </button>
                            <?= $this->session->flashdata('berhasil'); ?>
                        </div>
                        <div class="card-body">
                            <table class="table table-condesed table-hover">
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


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </section>

    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">XKereta</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul> -->
    <!-- <span class="navbar-text">
                <a href="<?= base_url('logout') ?>" class="text-muted" style="text-decoration: none;">Logout</a>
            </span> -->
    <!-- </div>
    </nav> -->



    <!-- Script JS -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/costum.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ff4c215153.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(".delete").click(function(e) {
                e.preventDefault();
                const href = $(this).attr('href');

                Swal.fire({
                    title: 'Apakah kamu yakin ingin menghapus data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus!',
                }).then((result) => {
                    if (result.isConfirmed) {

                        if (result.value) {
                            document.location.href = href;
                        }
                    }
                })
            });
        });
    </script>
</body>

</html>