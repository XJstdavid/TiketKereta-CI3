<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?> | Data Penumpang</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='<?= base_url('assets/css/costum.css') ?>' rel='stylesheet'>

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

        <div class="container-fluid my-5">
            <div class="row">

                <div class="col-md-12 mt-4">

                    <h4>Data Penumpang</h4>
                    <div class="col-md-12 mt-3">
                    </div>
                    <div class="card-body">
                        <table id="data" class="display table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Tiket</th>
                                    <th>Nama</th>
                                    <th>No Identitas</th>
                                    <th>Gerbong</th>
                                    <th>Bagian</th>
                                    <th>Kursi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($penumpang as $lt) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $lt->nomor_tiket ?></td>
                                        <td><?= $lt->nama ?></td>
                                        <td><?= $lt->no_identitas ?></td>
                                        <td><?= $lt->gerbong ?></td>
                                        <td><?= strtoupper($lt->bagian) ?></td>
                                        <td><?= $lt->kursi ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


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