<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>images/favicon.png">
        <title>Admin Dashboard</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url() ?>css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url("css/") ?>helper.css" rel="stylesheet">
        <link href="<?php echo base_url("css/") ?>style.css" rel="stylesheet">
        <link href="<?php echo base_url("css/") ?>jquery.dataTables.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
        <!--[if lt IE 9]>
        <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <style>
            .error{
                color: red;
            }
        </style>
    </head>

    <body class="fix-header fix-sidebar">
        <!-- Preloader - style you can find in spinners.css -->

        <!-- Main wrapper  -->
        <div id="main-wrapper">
            <div class="header">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <!-- Logo -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo base_url('admin') ?>">
                            <!-- Logo icon -->
                            <b><img src="<?php echo base_url()?>images/logo.png" alt="homepage" class="dark-logo" /></b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span><img src="<?php echo base_url()?>images/logo-text.png" alt="homepage" class="dark-logo" /></span>
                        </a>
                    </div>
                    <!-- End Logo -->
                    <div class="navbar-collapse">
                        <!-- toggle and nav items -->
                        <ul class="navbar-nav mr-auto mt-md-0">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                            <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>


                            <!-- Messages -->

                        </ul>
                        <!-- User profile and search -->
                        <ul class="navbar-nav my-lg-0">


                            <!-- Profile -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    
                                    <?php if (empty($this->session->userdata('user_session')['image']) && $this->session->userdata('user_session')['gender'] == 1) { ?>
                                        <img src="<?php echo base_url('images/avatar/2.jpg') ?>" alt="user" class="profile-pic">
                                    <?php } ?>
                                    <?php if (empty($this->session->userdata('user_session')['image']) && $this->session->userdata('user_session')['gender'] == 2) { ?>
                                        <img src="<?php echo base_url('images/avatar/7.jpg') ?>" alt="user" class="profile-pic">
                                    <?php } ?>
                                    <?php if (!empty($this->session->userdata('user_session')['image'])) { ?>
                                        <img src="<?php echo base_url('images/users/' . $this->session->userdata('user_session')['image'] . '') ?>" alt="user" class="profile-pic">
                                    <?php } ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                    <ul class="dropdown-user">
                                        <li><a href="<?php echo base_url("userProfile") ?>"><i class="ti-user"></i> Profile</a></li>

                                        <li role="separator" class="divider"></li>
                                        <li><a href="<?php echo base_url('logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>