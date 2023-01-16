<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem</title>

    <head>
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />

    </head>

<body>
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-primary text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-4 mt-md-4 pb-2">

                                <div class="container">
                                    <h3 class="fw-bold mb-2 text-uppercase" style="margin-bottom: 10px;">Login Sistem</h3>
                                    <?= $this->session->flashdata('pesan') ?>
                                    <hr>

                                    <?php if ($this->session->flashdata('message_login_error')) : ?>

                                        <?= $this->session->flashdata('message_login_error') ?>
                                    <?php endif ?>

                                    <form action="" method="post" style="max-width: 600px;">
                                        <div>
                                            <div class="form-outline form-white mb-4">
                                                <input type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?> form-control form-control-lg" placeholder="Your username or email" value="<?= set_value('username') ?>" required />
                                                <label class="form-label" for="username">Email/Username</label>
                                                <div class="invalid-feedback">
                                                    <?= form_error('username') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-outline form-white mb-4">
                                                <input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?> form-control form-control-lg" placeholder="Enter your password" value="<?= set_value('password') ?>" required />
                                                <label class="form-label" for="password">Password</label>
                                                <div class="invalid-feedback">
                                                    <?= form_error('password') ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <input type="submit" class="btn btn-warning btn-block" value="Login">
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>

</html>