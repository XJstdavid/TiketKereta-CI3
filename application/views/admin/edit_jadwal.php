<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?> | Edit Data Jadwal </title>
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
            <span class="text">Edit Data Jadwal</span>
        </div>

        <div class="container-fluid my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center">Edit Data Jadwal</div>
                        <div class="card-body">
                            <form action="<?= base_url('editJadwal') ?>" method="post">
                                <input type="hidden" name="id" value="<?= $data_edit->id ?>">
                                <div class="form-group">
                                    <label>Nama Kereta</label>
                                    <input type="text" name="nama_kereta" class="form-control" required value="<?= $data_edit->nama_kereta ?>">
                                </div>

                                <div class="form-group">
                                    <label>Stasiun Asal</label>
                                    <select name="asal" class="form-control" required>
                                        <optgroup label="TERPILIH">
                                            <option selected value="<?= $data_edit->asal ?>"><?= $data_edit->ASAL ?></option>
                                        </optgroup>
                                        <optgroup label="PILIHAN">
                                            <?php foreach ($stasiun as $st) : ?>
                                                <option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Stasiun Tujuan</label>
                                    <select name="tujuan" class="form-control" required>
                                        <optgroup label="TERPILIH">
                                            <option selected value="<?= $data_edit->tujuan ?>"><?= $data_edit->TUJUAN ?></option>
                                        </optgroup>
                                        <optgroup label="PILIHAN">
                                            <?php foreach ($stasiun as $st) : ?>
                                                <option value="<?= $st->id ?>"><?= $st->nama_stasiun ?></option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Berangkat</label>
                                    <?php $date = date_create($data_edit->tgl_berangkat); ?>
                                    <input type="datetime-local" class="form-control" name="tgl_berangkat" min="<?= date_format($date, 'm-d-Y\TH:i:s') ?>" value="<?= $data_edit->tgl_berangkat ?>" placeholder="Tanggal Berangkat" required>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Sampai</label>
                                    <?php $date = date_create($data_edit->tgl_sampai); ?>
                                    <input type="datetime-local" class="form-control" name="tgl_sampai" min="<?= date_format($date, 'm-d-Y\TH:i:s') ?>" value="<?= $data_edit->tgl_sampai ?>" placeholder="Tanggal Berangkat" required>
                                </div>

                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="kelas" class="form-control" required>
                                        <optgroup label="TERPILIH">
                                            <option selected value="<?= $data_edit->kelas ?>"><?= $data_edit->kelas ?></option>
                                        </optgroup>
                                        <optgroup label="PILIHAN">
                                            <option value="Ekonomi">Ekonomi</option>
                                            <option value="Eksekutif">Eksekutif</option>
                                            <option value="Bisnis">Bisnis</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <button class="btn btn-outline-warning btn-block">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Script JS -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/costum.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ff4c215153.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>