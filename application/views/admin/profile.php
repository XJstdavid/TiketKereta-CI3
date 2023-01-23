<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--<title>Profile Card UI Design</title>-->

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='<?= base_url('assets/css/costum.css') ?>' rel='stylesheet'>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
    <link rel="icon" href="<?= base_url('assets/icon.png') ?>">
    <style>
        /* Google Fonts - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f4f4f4;
        }

        .profile-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 370px;
            width: 100%;
            background: #fff;
            border-radius: 24px;
            padding: 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .profile-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 36%;
            width: 100%;
            border-radius: 24px 24px 0 0;
            background-color: #4070f4;
        }

        .image {
            position: relative;
            height: 150px;
            width: 150px;
            border-radius: 50%;
            background-color: #4070f4;
            padding: 3px;
            margin-bottom: 10px;
        }

        .image .profile-img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #fff;
        }

        .profile-card .text-data {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #333;
        }

        .text-data .name {
            font-size: 22px;
            font-weight: 500;
        }

        .text-data .job {
            font-size: 15px;
            font-weight: 400;
        }

        .profile-card .media-buttons {
            display: flex;
            align-items: center;
            margin-top: 15px;
        }

        .media-buttons .link {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 18px;
            height: 34px;
            width: 34px;
            border-radius: 50%;
            margin: 0 8px;
            background-color: #4070f4;
            text-decoration: none;
        }

        .profile-card .buttons {
            display: flex;
            align-items: center;
            margin-top: 25px;
        }

        .buttons .button {
            color: #fff;
            font-size: 14px;
            font-weight: 400;
            border: none;
            border-radius: 24px;
            margin: 0 10px;
            padding: 8px 24px;
            background-color: #4070f4;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .buttons .button:hover {
            background-color: #0e4bf1;
        }

        .profile-card .analytics {
            display: flex;
            align-items: center;
            margin-top: 25px;
        }

        .analytics .data {
            display: flex;
            align-items: center;
            color: #333;
            padding: 0 20px;
            border-right: 2px solid #e7e7e7;
        }

        .data i {
            font-size: 18px;
            margin-right: 6px;
        }

        .data:last-child {
            border-right: none;
        }
    </style>

</head>

<body>

    <?php include 'include/nav.php' ?>

    <?php
    $avatar = $current_user->avatar ?
        base_url('upload/avatar/' . $current_user->avatar)
        : get_gravatar($current_user->email)
    ?>

    <div class="profile-card">
        <div class="image">

            <img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" class="profile-img" />
        </div>

        <div class="text-data">
            <span class="name"><?= htmlentities($current_user->name) ?></span>
            <span class="job"><?= htmlentities($current_user->email) ?></span>
        </div>



        <div class="text-data mt-3">
            <span class="name" style="font-size: 15px;">Create At : <?= format_indo(date(($current_user->created_at))); ?></span>
            <span class="name" style="font-size: 15px;">Last Login : <?= format_indo(date(($current_user->last_login))) ?></span>
        </div>

    </div>
</body>

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

</html>