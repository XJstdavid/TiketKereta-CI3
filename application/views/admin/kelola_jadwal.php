<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?> | Kelola Jadwal</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='<?= base_url('assets/css/costum.css') ?>' rel='stylesheet'>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
</head>

<body>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="<?= base_url() ?>" class="nav_logo">
                        <i class="bi bi-train-front-fill" style="color: white;"></i>
                        <span class="nav_logo-name">Admin Panel</span> </a>
                    <div class="nav_list">
                        <a href="<?= base_url('admin/dashboard') ?>" class="nav_link active"><i class="bi bi-clipboard-data-fill"></i><span class="nav_name">Data Stasiun</span></a>
                        <a href="<?= base_url('admin/dashboard/kelola-jadwal') ?>" class="nav_link">
                            <i class="bi bi-clipboard-data-fill"></i> <span class="nav_name">Data Jadwal</span>
                        </a>
                    </div>
                </div>
                <a href="<?= base_url('auth/logout') ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">

                    <div class="container-fluid my-5">
                        <div class="row">

                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-header bg-primary text-white text-center">Daftar Jadwal</div>
                                    <div class="col-md-12 mt-3">
                                        <a class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 10px; margin-bottom: 15px;">Tambah Data Jadwal</a>
                                        <br>
                                        <?= $this->session->flashdata('berhasil'); ?>
                                    </div>
                                    <div class="card-body">
                                        <table id="data" class="display table table-bordered">
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
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($jadwal as $jd) { ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $jd->nama_kereta ?></td>
                                                        <td><?= $jd->ASAL ?></td>
                                                        <td><?= $jd->TUJUAN ?></td>
                                                        <td><?= format_indo(date($jd->tgl_berangkat)) ?></td>
                                                        <td><?= format_indo(date($jd->tgl_sampai)) ?></td>
                                                        <td><?= $jd->kelas ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/dashboard/edit-jadwal/' . $jd->id) ?>" class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href="<?= base_url('hapusJadwal/' . $jd->id) ?>" class="delete btn btn-outline-danger btn-sm"><i class=" fa-solid fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
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
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="number" name="harga" placeholder="Harga" class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">reset</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Tambah Jadwal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Script JS -->
        <script src="<?= base_url('assets/js/costum.js') ?>"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/ff4c215153.js" crossorigin="anonymous"></script>

        <!-- datatable -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2Z3.3/b-print-2.3.3/sb-1.4.0/datatables.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

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

        <script>
            $(document).ready(function() {
                $('#data').DataTable();
            });
        </script>

        <script>
            $(".theSelect").select2();
            $(".theSelect").select2({
                dropdownParent: $("#create")
            })
        </script>
    </body>

</html>