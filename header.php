<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once 'config/database.php';
error_reporting(0);
// echo "<pre>";
// print_r($_SESSION['menu']);
// echo "</pre>";

// echo $_SERVER['PHP_SELF'];
// echo $_SERVER['REQUEST_URI'];
$filemenu = explode('/', $_SERVER['PHP_SELF']);
$filemenu = $filemenu['2'];

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="icon" type="image/png" sizes="68x70" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div><img src="assets/img/icon_bw.png" style="width: 45px;filter: brightness(0%) contrast(200%) grayscale(100%) invert(100%) saturate(0%) sepia(0%);opacity: 0.85;"></div>
                    <div class="sidebar-brand-text mx-3"><span><span style="font-weight: normal !important;">CIKARANG</span><br>DRY PORT</span></div>
                </a>
                <hr class="sidebar-divider my-0" style="width: 75%;">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <!-- Fungsi menampilkan menu dari database dan session -->
                    <?php foreach ($_SESSION['menu'] as $key => $value) { ?>
                        <?php if (!isset($value['child'])) { ?>
                            <?php if ($filemenu == $value['menu_uri']) { ?>
                                    <li class="nav-item active" style="background-color: rgba(252, 252, 252, 0.09);"><a class="nav-link active" href="<?php echo $value['menu_uri'];?>"><i class="<?php echo $value['menu_icon'];?>" style="width: 18px;"></i><span><?php echo $value['menu'] ?></span></a></li>
                                <?php }else{ ?>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo $value['menu_uri'];?>"><i class="<?php echo $value['menu_icon'];?>" style="width: 18px;"></i><span><?php echo $value['menu'] ?></span></a></li>
                            <?php } ?>
                        <?php }else{ ?>
                            <?php if ($_SESSION['childparent'][$filemenu] == $key) { ?>
                                    <li class="nav-item active" style="background-color: rgba(252, 252, 252, 0.09);"><a class="nav-link collapsed active" href="#" data-toggle="collapse" data-target="<?php echo "#".$value['menu'] ?>" aria-expanded="false" aria-controls="<?php echo $value['menu'] ?>"><i class="<?php echo $value['menu_icon'];?>" style="width: 18px;"></i><span><?php echo $value['menu'] ?></span></a>

                                        <div id="<?php echo $value['menu'] ?>" class="collapse show" aria-labelledby="<?php echo "heading".$value['menu'] ?>" data-parrent="#accordionSidebar">
                                            <div class="bg-white py-2 collapse-inner rounded">
                                                <!-- <h6 class="collapse-header">Header</h6> -->
                                                <?php foreach ($value['child'] as $keyx => $valuex) { ?>
                                                    <?php if ($filemenu == $valuex['menu_uri']) { ?>
                                                        <a class="collapse-item active" href="<?php echo $valuex['menu_uri'];?>"><?php echo $valuex['menu'] ?></a>
                                                     <?php }else{ ?>
                                                        <a class="collapse-item" href="<?php echo $valuex['menu_uri'];?>"><?php echo $valuex['menu'] ?></a>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    </li>
                                <?php }else{ ?>
                                    <li class="nav-item"><a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="<?php echo "#".$value['menu'] ?>" aria-expanded="false" aria-controls="<?php echo $value['menu'] ?>"><i class="<?php echo $value['menu_icon'];?>" style="width: 18px;"></i><span><?php echo $value['menu'] ?></span></a>

                                        <div id="<?php echo $value['menu'] ?>" class="collapse" aria-labelledby="<?php echo "heading".$value['menu'] ?>" data-parrent="#accordionSidebar">
                                            <div class="bg-white py-2 collapse-inner rounded">
                                                <!-- <h6 class="collapse-header">Header</h6> -->
                                                <?php foreach ($value['child'] as $keyx => $valuex) { ?>
                                                    <?php if ($filemenu == $valuex['menu_uri']) { ?>
                                                        <a class="collapse-item active" href="<?php echo $valuex['menu_uri'];?>"><?php echo $valuex['menu'] ?></a>
                                                     <?php }else{ ?>
                                                        <a class="collapse-item" href="<?php echo $valuex['menu_uri'];?>"><?php echo $valuex['menu'] ?></a>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </li>
                            <?php } ?>

                        <?php } ?>
                    <?php } ?>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $_SESSION['username'] ?></span><i class="fas fa-user" style="color: rgb(95,95,95);"></i></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item" href="profile.html"><i class="fas fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>