<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
<!-- Logo -->
<a href="<?php base_url2()?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>R</b>C</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Tirta Dahaga</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-user"></i><span class="hidden-xs"><?php echo $this->session->userdata('name');?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="<?php base_url2()?>home/profile" class="btn btn-default btn-flat">Profile</a>
            </div>

            <div class="pull-right">
                <a href="<?php base_url2()?>logout" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
</ul>
</div>
</nav>
</header>
