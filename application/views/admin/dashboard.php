<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?> | Kelola Jadwal</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="<?= base_url('assets/admins/') ?>css/main/app.css">
    <link rel="stylesheet" href="<?= base_url('assets/admins/') ?>css/main/app-dark.css">
    <link rel="stylesheet" href="<?= base_url('assets/admins/') ?>css/shared/iconly.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
    <link rel="icon" href="<?= base_url('assets/icon.png') ?>">

</head>

<body>

    <?php include 'include/nav.php' ?>
    <!--Container Main start-->
    <div id="page-content-wrapper">
        <div class="container-fluid mt-5">
            <div class="row">


                <div class="col-md-12 mt-4">
                    <h4>Data Stasiun</h4>
                    <div class="col-md-12 mt-3">

                        <?= $this->session->flashdata('pesan') ?>
                        <div class="col-md-12 mt-3">
                            <a class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 10px; margin-bottom: 10px;">Tambah Data Stasiun</a>
                            <br>
                            <?= $this->session->flashdata('berhasil'); ?>
                        </div>

                        <div class="card-body">
                            <table id="data" class="display table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Stasiun</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($stasiun as $st) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $st->nama_stasiun ?></td>
                                            <td><img style="width: 200px" src="<?php echo $st->image; ?>"></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="<?= base_url('admin/dashboard/edit/' . $st->id) ?>" class="btn btn-outline-warning btn-sm" style="margin-left: 10px;"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="<?= base_url('hapusStasiun/' . $st->id) ?>" class="delete btn btn-outline-danger btn-sm" style="margin-left: 10px;"><i class=" fa-solid fa-trash"></i></a>
                                                </div>
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
                        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Stasiun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="<?php echo base_url('tambahStasiun') ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Stasiun</label>
                                <input type="text" class="form-control" name="stasiun" placeholder="Nama Stasiun">
                            </div>
                            <div class="form-group">
                                <label>Upload Gambar</label>
                                <input type="file" class="form-control" name="image" placeholder="Gambar Stasiun" accept="image/" onchange="loadFile(event)">
                                <br>
                                <img id="output" width="200" src="https://st4.depositphotos.com/14953852/22772/v/600/depositphotos_227725052-stock-illustration-image-available-icon-flat-vector.jpg" class="center">
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Stasiun</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Container Main end-->



    <!-- Script JS -->
    <script src="<?= base_url('assets/admins/') ?>js/bootstrap.js"></script>
    <script src="<?= base_url('assets/admins/') ?>js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="<?= base_url('assets/admins/') ?>extensions/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url('assets/admins/') ?>js/pages/dashboard.js"></script>
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

</body>

</html>

<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>

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