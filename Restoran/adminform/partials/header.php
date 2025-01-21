<?php include 'db.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

</head>

<body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-white">
        Tabel Data
    </div>

 
    <?php if ($_SESSION['role'] === 'admin'): ?>
    <!-- Nav Item - Users-->
    <li class="nav-item">
        <a class="nav-link" href="tb_users.php">
            <i class="fas fa-users text-light"></i>
            <span class="text-light">Tabel Users</span></a>
    </li>
    <?php endif; ?>


        <!-- Nav Item - Tables -->
    <li class="nav-item">
            <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table text-light"></i>
            <span class="text-light">Table Menu</span></a>
    </li>

    <!-- Nav Item - Tb_booking -->
    <li class="nav-item">
        <a class="nav-link" href="tb_booking.php">
        <i class="fas fa-receipt text-light"></i>
            <span class="text-light"> Tabel Booking</span></a>
    </li>

        <!-- Nav Item - Tb_booking -->
    <li class="nav-item">
        <a class="nav-link" href="tb_contact.php">
        <i class="fas fa-envelope-open-text text-light"></i>
            <span class="text-light">Tabel Contact</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading text-light">
        Ubah Text Halaman
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog text-light"></i>
            <span class="text-light">Tampilan Text Resto</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman:</h6>
                <a class="collapse-item" href="tb_home.php">Home</a>
                <a class="collapse-item" href="tb_about.php">About Us</a>
                <a class="collapse-item" href="tb_service.php">Services</a>
                <a class="collapse-item" href="tb_testimoni.php">Testimoni</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading text-white">
            Website Restoran
        </div>

        <!-- Nav Item - Tb_booking -->
    <li class="nav-item">
        <a class="nav-link" href="../index.php" target="_blank">
        <i class="fas fa-home text-light"></i>
        <span class="text-light">Ke Website Restoran</span></a>
    </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
