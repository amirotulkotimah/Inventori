<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo_nix.png">
        <title>Inventaris</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/metro/MetroJs.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/morris/morris.css">
        <link href="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

        <!-- DataTables -->
        <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url();?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/plugins/animate/animate.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/highcharts/style.css" type="text/css">
        <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    </head>

        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">
                    <div id="navigation">

                        <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
                        <div class="logo">
                        
                        <a href="<?php echo site_url('home_c'); ?>" class="logo">
                            <img src="" alt="" class="logo-small">
                            <img src="<?php echo base_url('assets/images/logo_in.PNG'); ?>" alt=""class="logo-large">
                        </a>

                    </div>
                        <?php endif ?>

                        <div class="menu-extras topbar-custom">

                        
                            
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>

                        <!-- Navigation Menu-->
                        <ul class="navigation-menu text-right ">

                        <a href="home.html" class="navbar-brand ">
                            <h4 class="m-0 text-uppercase text-light"><i class=""></i></h4>
                        </a>
                            <!--<li class="has-submenu">
                                <a href="<?php echo site_url('home_c'); ?>"><i class="mdi mdi-airplay"></i>Home</a>
                            </li>-->

                            <!--<li class="has-submenu">
                                <a href="<?php echo site_url('Stok_c'); ?>"><i class="far fa-folder "></i>Stok</a>                                
                            </li>-->
                            <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
                            <li class="has-submenu">
                                <a href="#"><i class="far fa-folder"></i>Stok</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <?php
                                            foreach ($role_kategori as $item)
                                            {
                                                ?>
                                            <li><a href="<?php echo base_url('stok_c/stok/'. $item->id_kategori);?>" name="id_kategori" value="<?= $item->id_kategori ?>"><?= $item->nama_kategori ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <?php endif ?>

                            <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
                            <li class="has-submenu">
                                <a href="#"><i class="fas fa-file-alt"></i>Transaksi</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="<?php echo site_url('barang_masuk_c'); ?>">Barang Masuk</a></li>
                                            <li><a href="<?php echo site_url('barang_keluar_c'); ?>">Barang Keluar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <?php endif ?>

                            <!--<?php if ($getGrup == 1 || $getGrup == 2) : ?>
                            <li class="has-submenu">
                                <a href="<?php echo site_url('kategori_c'); ?>"><i class="fas fa-list-ul"></i>Kategori</a>                                
                            </li>
                            <?php endif ?>-->
                            
                            <?php if ($getGrup == 1 || $getGrup == 2) : ?>
                            <li class="has-submenu">
                                <a href="#"><i class="fas fa-list-ul"></i>Kelola</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="<?php echo site_url('kategori_c'); ?>">Kategori</a></li>
                                            <li><a href="<?php echo site_url('lokasi_c'); ?>">Lokasi</a></li>
                                            <li><a href="<?php echo site_url('sublokasi_c'); ?>">Sub Lokasi</a></li>
                                            <li><a href="<?php echo site_url('brand_c'); ?>">Kelola Brand</a></li>
                                            <li><a href="<?php echo site_url('kurir_c'); ?>">Kelola Kurir</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <?php endif ?>

                            <!--<?php if ($getGrup == 1 || $getGrup == 2) : ?>
                            <li class="has-submenu">
                                <a href="#"><i class="far fa-chart-bar"></i>Statistik</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="<?php echo site_url('statistic_c/baju/'. $nama_kategori='Baju'); ?>" name="nama_kategori" value="Baju">Baju</a></li>
                                            <li><a href="<?php echo site_url('statistic_c/skincare/'. $nama_kategori='Skincare'); ?>" name="nama_kategori" value="Skincare">Skincare</a></li>
                                            <li><a href="<?php echo site_url('statistic_c/minuman/'. $nama_kategori='Minuman'); ?>" name="nama_kategori" value="Minuman">Minuman</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <?php endif ?>-->
                            <?php if ($getGrup == 1 || $getGrup == 2) : ?>
                            <li class="has-submenu">
                                <a href="#"><i class="far fa-chart-bar"></i>Statistik</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <?php
                                            foreach ($role_kategori as $item)
                                            {
                                                ?>
                                            <li><a href="<?php echo base_url('statis_c/lihat_grafik/'. $item->id_kategori);?>" name="id_kategori" value="<?= $item->id_kategori ?>"><?= $item->nama_kategori ?></a></li>
                                            <?php } ?>
                                            <li><a href="<?php echo site_url('history_c'); ?>">History Log</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <?php endif ?>

                            <?php if ($getGrup == 1|| $getGrup == 2) : ?>
                            <li class="has-submenu">
                                <a href="#"><i class="fas fa-user-friends"></i>Master User</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul><?php if ($getGrup == 1) : ?>
                                            <li><a href="<?php echo site_url('master_user_c'); ?>">Master User</a></li>
                                            <?php endif ?>
                                            <li><a href="<?php echo site_url('data_pengguna_c'); ?>">Data Pengguna</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <?php endif ?>

                            
                            <li class="has-submenu">
                                <a href="#"><i class="fas fa-user-circle"></i><?php echo ($this->session->userdata('session_nama'));?></a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul><?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
                                            <li><a href="<?php echo site_url('profil_c'); ?>">Profil</a></li>
                                            <?php endif ?>
                                            <li><a href="<?php echo site_url('login_c/logout'); ?>">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end navigation -->
                </div> <!-- end container -->
             <!-- end navbar-custom -->
        </header>
        
        <br>
        <br>
        <br>