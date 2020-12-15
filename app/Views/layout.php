<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ASK ERP ADMIN</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>/public/favicon.ico"/>

    <link href="<?php echo base_url();?>/public/adminlte/css/AdminLTE.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/public/adminlte/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/public/adminlte/css/skin-blue.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/public/adminlte/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/public/adminlte/css/site.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="<?php echo base_url();?>/public/adminlte/js/jquery.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="loading" style="width:100%; position: absolute; display: none;">
        <img id="loader-img" src="https://megaweb.com.vn/skin/frontend/images/loading1.gif" style="width: 100px; height: 100px; margin: 200px auto;z-index: 1111;"/>
    </div>
    <div class="wrapper">
        <header class="main-header">
            <a href="<?php echo base_url();?>" class="logo">
                <span class="logo-mini"><img height="25px" src="<?php echo base_url();?>/public/img/logo-320.png" alt="ASK" /></span>
                <span class="logo-lg">
                    <img style="display: block;margin: 10px auto;height: 30px;" src="<?php echo base_url();?>/public/img/logo-320.png" alt="ASK" />
                    <b style="text-shadow: 2px 0px 5px #3c8dbc;letter-spacing: 2px;">ASK</b>
                </span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="http://placehold.it/160x160" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>

                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu" style="margin-right: 20px;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="http://placehold.it/160x160" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= session()->get('name') ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a style="padding: 10px 20px;" href="#">Thông tin cá nhân</a>
                                </li>
                                <li>
                                    <a style="padding: 10px 20px;" href="#">Đổi mật khẩu</a>
                                </li>
                                <li>
                                    <a style="padding: 10px 20px;" href="<?php echo base_url();?>/logout">Đăng xuất</a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                    <img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="<?= session()->get('name') ?>">
                    </div>
                    <div class="pull-left info">
                        <p><?= session()->get('name') ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <ul class="sidebar-menu tree" data-widget="tree">
                        <li class="header">
                            <span><span>MAIN</span></span>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-th"></i><span>Widgets</span><i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/site/menu"><span>Menu</span></a></li>
                                <li><a href="/site/grid"><span>GridView</span></a></li>
                                <li><a href="/site/boxes"><span>Boxes</span></a></li>
                                <li><a href="/site/flash-alert"><span>FlashAlert</span></a></li>
                                <li><a href="/site/callouts"><span>Callouts</span></a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <ul class="sidebar-menu tree" data-widget="tree">
                        <li class="header">
                            <span><span>SETTING</span></span>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>contact">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <span>Liên hệ</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper" style="min-height: calc(100vh - 100px);">
                <?= $this->renderSection('content') ?>
            </div>
        </div>

        <script src="<?php echo base_url();?>/public/adminlte/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>/public/adminlte/js/app.min.js"></script>
        <script src="<?php echo base_url();?>/public/adminlte/js/myjs.js"></script>
        <script src="<?php echo base_url();?>/public/adminlte/js/fastclick.min.js"></script>
        <script src="<?php echo base_url();?>/public/adminlte/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>/public/adminlte/js/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>/public/adminlte/js/jquery.tshift.min.js"></script>
        
    </body>
</html>
