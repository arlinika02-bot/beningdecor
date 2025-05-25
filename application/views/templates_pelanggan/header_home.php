<!DOCTYPE html>
<html lang="en">

<head>
    <title>BA Decoration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo base_url('assets/assets_shop')?>/img/logobening.png">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/assets_shop')?>/img/logo.png">

    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop')?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop')?>/css/templatemo.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop')?>/css/custom.css">


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop')?>/css/fontawesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>



<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-success navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none"
                        href="mailto:beningdecor@gmail.com">beningdecor@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="https://wa.me/6285786372243">+62
                        857 8637 2243</a>
                </div>
                <div>
                    <a class="text-light" href="https://www.instagram.com/bening_anugrah_decor" target="_blank"><i
                            class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.tiktok.com/@tariitori" target="_blank"><i
                            class="fab fa-tiktok fa-sm fa-fw me-2"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="">
                BeningAnugrah
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Pelanggan/dashboard') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Pelanggan/about') ?>">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dekorasi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= base_url('Pelanggan/data_dekorasi') ?>">All</a>
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('Pelanggan/package') ?>">Package</a>
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('Pelanggan/onlydecoration') ?>">Only
                                        Decoration</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Pelanggan/transaksi') ?>">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/login') ?>">Login</a>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
    </nav>
    <!-- Close Header -->