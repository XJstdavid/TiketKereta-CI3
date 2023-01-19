<!DOCTYPE html>
<!-- Coding by CodingLab || www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Import Google font - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins",
                sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0faff;
        }

        .wrapper {
            position: relative;
            max-width: 470px;
            width: 100%;
            border-radius: 12px;
            padding: 20px 30px 120px;
            background: #4070f4;
            box-shadow: 0 5px 10px rgba(0,
                    0,
                    0,
                    0.1);
            overflow: hidden;
        }

        .form.login {
            position: absolute;
            left: 50%;
            bottom: -86%;
            transform: translateX(-50%);
            width: calc(100% + 220px);
            padding: 20px 140px;
            border-radius: 50%;
            height: 100%;
            background: #fff;
            transition: all 0.6s ease;
        }

        .wrapper.active .form.login {
            bottom: -15%;
            border-radius: 35%;
            box-shadow: 0 -5px 10px rgba(0, 0, 0, 0.1);
        }

        .form header {
            font-size: 30px;
            text-align: center;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
        }

        .form.login header {
            color: #333;
            opacity: 0.6;
        }

        .wrapper.active .form.login header {
            opacity: 1;
        }

        .wrapper.active .signup header {
            opacity: 0.6;
        }

        .wrapper form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 40px;
        }

        form input {
            height: 60px;
            outline: none;
            border: none;
            padding: 0 15px;
            font-size: 16px;
            font-weight: 400;
            color: #333;
            border-radius: 8px;
            background: #fff;
        }

        .form.login input {
            border: 1px solid #aaa;
        }

        .form.login input:focus {
            box-shadow: 0 1px 0 #ddd;
        }

        form .checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .checkbox input[type="checkbox"] {
            height: 16px;
            width: 16px;
            accent-color: #fff;
            cursor: pointer;
        }

        form .checkbox label {
            cursor: pointer;
            color: #fff;
        }

        form a {
            color: #333;
            text-decoration: none;
        }

        form a:hover {
            text-decoration: underline;
        }

        form input[type="submit"] {
            margin-top: 15px;
            padding: none;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
        }

        .form.login input[type="submit"] {
            background: #4070f4;
            color: #fff;
            border: none;
        }
    </style>
</head>

<body>
    <section class="wrapper">
        <div class="form signup">
            <header>Login</header>
            <hr>
            <?= $this->session->flashdata('pesan') ?>

            <?php if ($this->session->flashdata('message_login_error')) : ?>

                <?= $this->session->flashdata('message_login_error') ?>
            <?php endif ?>

            <form action="" method="post" style="max-width: 600px;">
                <input type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?> form-control form-control-lg" placeholder="Your username or email" value="<?= set_value('username') ?>" required />

                <div class="invalid-feedback">
                    <?= form_error('username') ?>
                </div>


                <input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?> form-control form-control-lg" placeholder="Enter your password" value="<?= set_value('password') ?>" required />

                <div class="invalid-feedback">
                    <?= form_error('password') ?>
                </div>

                <input type="submit" value="Login" />
            </form>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>