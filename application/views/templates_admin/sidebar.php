<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <ul class="navbar-nav mr-3">
                    <li><a href="<?php echo base_url('admin/dashboard')?>" data-toggle="sidebar"
                            class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image"
                                src="<?php echo base_url('assets/assets_stisla')?>/assets/img/avatar/avatar-1.png"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('nama'); ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?php echo base_url('admin/profil')?>" class="dropdown-item has-icon">
                                <i class="fas fa-user"></i> Profil
                            </a>
                            <a href="<?php echo base_url('auth/change_password')?>" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Ubah Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url('auth/logout')?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>

            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="">BA Decoration</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="">BA</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li>
                            <a class="nav-link <?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>"
                                href="<?= base_url('Admin/dashboard') ?>">
                                <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a class="nav-link <?= $this->uri->segment(2) == 'admin' ? 'active' : '' ?>"
                                href="<?= base_url('Admin/data_admin') ?>">
                                <i class="fas fa-user"></i> <span>Kelola Admin</span>
                            </a>
                        </li>


                        <li>
                            <a class="nav-link <?= $this->uri->segment(2) == 'pelanggan' ? 'active' : '' ?>"
                                href="<?= base_url('Admin/pelanggan') ?>">
                                <i class="fas fa-user"></i> <span>Kelola Pelanggan</span>
                            </a>
                        </li>

                        <li>
                            <a class="nav-link <?= $this->uri->segment(2) == 'dekorasi' ? 'active' : '' ?>"
                                href="<?= base_url('Admin/dekorasi') ?>">
                                <i class="fas fa-image"></i> <span>Kelola Dekorasi</span>
                            </a>
                        </li>

                        <li>
                            <a class="nav-link <?= $this->uri->segment(2) == 'kategori' ? 'active' : '' ?>"
                                href="<?= base_url('Admin/kategori') ?>">
                                <i class="fas fa-grip-horizontal"></i> <span>Kelola Kategori</span>
                            </a>
                        </li>

                        <li>
                            <a class="nav-link <?= $this->uri->segment(2) == 'rekening' ? 'active' : '' ?>"
                                href="<?= base_url('Admin/rekening') ?>">
                                <i class="fas fa-credit-card"></i> <span>Kelola Rekening</span>
                            </a>
                        </li>

                        <li>
                            <a class="nav-link <?= $this->uri->segment(2) == 'transaksi' ? 'active' : '' ?>"
                                href="<?= base_url('Admin/transaksi') ?>">
                                <i class="fas fa-wallet"></i> <span>Transaksi</span>
                            </a>
                        </li>

                        <li>
                            <a class="nav-link <?= $this->uri->segment(2) == 'laporan' ? 'active' : '' ?>"
                                href="<?= base_url('Admin/laporan') ?>">
                                <i class="fas fa-clipboard-list"></i> <span>Laporan</span>
                            </a>
                        </li>

                        <li>
                            <a class="nav-link" href="<?= base_url('Auth/logout') ?>">
                                <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                            </a>
                        </li>
                    </ul>



                </aside>
            </div>