<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?> | Edit Jadwal</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='<?= base_url('assets/css/costum.css') ?>' rel='stylesheet'>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
</head>

<body>

    <?php include 'include/nav.php' ?>
    <!--Container Main start-->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid my-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6 mt-4">
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

                                        <button class="btn btn-outline-warning btn-block mt-3">Update</button>
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