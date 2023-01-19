<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="" class="nav_logo text-decoration-none">
                    <i class="bi bi-train-front-fill" style="color: white;"></i>
                    <span class="nav_logo-name">Admin Panel</span> </a>

                <div class="nav_list">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav_link active text-decoration-none">
                        <i class="bi bi-clipboard-data-fill"></i><span class="nav_name">Data Stasiun</span></a>
                    <a href="<?= base_url('admin/dashboard/kelola-jadwal') ?>" class="nav_link text-decoration-none">
                        <i class="bi bi-clipboard-data-fill"></i> <span class="nav_name">Data Jadwal</span>
                    </a>
                    <a href="<?= base_url('admin/konfirmasi-pembayaran') ?>" class="nav_link text-decoration-none">
                        <i class="bi bi-receipt"></i></i> <span class="nav_name">Invoices</span>
                    </a>
                </div>
            </div>
            <a href="<?= base_url('auth/logout') ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>