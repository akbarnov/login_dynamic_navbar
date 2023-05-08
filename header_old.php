<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Fleet Management System</title>
    <link rel="icon" type="image/png" sizes="68x70" href="<?php echo base_url("assets/img/icon.png");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/select2/css/select2.css");?>">
    <link rel="manifest" href="<?php echo base_url("manifest.json");?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="<?php echo base_url("assets/fonts/fontawesome-all.min.css");?>">

    <script src="<?php echo base_url().'assets/js/jquery.min.js' ?>"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="<?php echo base_url('Fleet/index');?>">
                    <div><img src="<?php echo base_url("assets/img/icon_bw.png");?>" style="width: 45px;filter: brightness(0%) contrast(200%) grayscale(100%) invert(100%) saturate(0%) sepia(0%);opacity: 0.85;"></div>
                    <div class="sidebar-brand-text mx-3"><span><span style="font-weight: normal !important;">CIKARANG</span><br>DRY PORT</span></div>
                </a>
                <!-- <hr class="sidebar-divider my-0" style="width:75%"> -->
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <!-- Fungsi menampilkan menu dari database dan session -->
                    <?php foreach ($this->session->userdata('menu') as $key => $value) { ?>
                        <?php if ($this->router->fetch_method() == $key) { ?>
                                <li class="nav-item active" style="background-color: rgba(252, 252, 252, 0.09);"><a class="nav-link active" href="<?php echo base_url('Fleet/'.$key);?>"><i class="fas fa-edit" style="width: 18px;"></i><span><?php echo $value ?></span></a></li>
                            <?php }else{ ?>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Fleet/'.$key);?>"><i class="fas fa-edit" style="width: 18px;"></i><span><?php echo $value ?></span></a></li>
                            <?php } ?>
                    <?php } ?>
                </ul>
                <div class="text-center d-none d-md-inline">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                </div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <ul class="navbar-nav flex-nowrap ml-auto">
                        <li class="nav-item dropdown show d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="true" data-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                            <div class="dropdown-menu show dropdown-menu-right p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto navbar-search w-100">
                                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                        <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $this->session->userdata('userid')?></span><i class="fas fa-user fa-xs" style="color: rgb(95,95,95);"></i></a>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item" href="profile.php"><i class="fas fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Reset Password</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo base_url('Fleet/Logout');?>"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>