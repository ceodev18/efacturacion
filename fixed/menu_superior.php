<!--top bar start-->
<div class="top-bar light-top-bar">
<!--by default top bar is dark, add .light-top-bar class to make it light-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-6">
                <a href="index.php" class="admin-logo">
                    <h1><img src="../public/images/logo.png" height="45px" alt="Chimbote Store"></h1>
                </a>
                <div class="left-nav-toggle visible-xs visible-sm">
                    <a href="#">
                        <i class="glyphicon glyphicon-menu-hamburger"></i>
                    </a>
                </div><!--end nav toggle icon-->
                <!--start search form-->
                <!--div class="search-form hidden-xs">
                    <form>
                        <input type="text" class="form-control" placeholder="Search for...">
                        <button type="button" class="btn-search"><i class="fa fa-search"></i></button>
                    </form>
                </div>-->
                <!--end search form-->
            </div>
            <div class="col-xs-6">
                <ul class="list-inline top-right-nav">
                    <li class="dropdown hidden-xs icon-dropdown">
                        <a href="../contents/reg_venta.php" class="dropdown-toggle" >
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="dropdown hidden-xs icon-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-envelope"></i>
                            <span class="badge badge-warning">4</span>
                        </a>
                        <ul class="dropdown-menu top-dropdown lg-dropdown notification-dropdown">
                            <li>
                                <div class="dropdown-header"><a href="#" class="pull-right text-muted"><small>View All</small></a> Messages </div>
                                <div class="scrollDiv">

                                    <div class="notification-list">
<!--                                        <a href="javascript: void(0);" class="clearfix">
                                            <span class="notification-icon">
                                                <img src="images/avtar-2.jpg" alt="" class="img-circle" width="50">
                                            </span>                                                 
                                            <span class="notification-title">John Doe <label class="label label-primary pull-right">Office</label></span>
                                            <span class="notification-description">Praesent dictum nisl non est sagittis luctus.</span>
                                            <span class="notification-time">40 minutes ago</span>
                                        </a>
                                        <a href="javascript: void(0);" class="clearfix">
                                            <span class="notification-icon">
                                                <img src="images/avtar-3.jpg" alt="" class="img-circle" width="50">
                                            </span>                                                 
                                            <span class="notification-title">Emily Doe  <label class="label label-info pull-right">Marketing</label></span>
                                            <span class="notification-description">Praesent dictum nisl non est sagittis luctus.</span>
                                            <span class="notification-time">40 minutes ago</span>
                                        </a>
                                        <a href="javascript: void(0);" class="clearfix">
                                            <span class="notification-icon">
                                                <img src="images/avtar-4.jpg" alt="" class="img-circle" width="50">
                                            </span>                                                 
                                            <span class="notification-title">Michael Clark <label class="label label-warning pull-right">Support</label> </span>
                                            <span class="notification-description">Praesent dictum nisl non est sagittis luctus.</span>
                                            <span class="notification-time">40 minutes ago</span>
                                        </a>
                                        <a href="javascript: void(0);" class="clearfix">
                                            <span class="notification-icon">
                                                <img src="images/avtar-5.jpg" alt="" class="img-circle" width="50">
                                            </span>                                                 
                                            <span class="notification-title">Ronaldo <label class="label label-success pull-right">Metting</label> </span>
                                            <span class="notification-description">Praesent dictum nisl non est sagittis luctus.</span>
                                            <span class="notification-time">40 minutes ago</span>
                                        </a>-->
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown hidden-xs icon-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-bell"></i>
                            <span class="badge badge-danger">6</span>
                        </a>
                        <ul class="dropdown-menu top-dropdown lg-dropdown notification-dropdown">
                            <li>
                                <div class="dropdown-header"><a href="#" class="pull-right text-muted"><small>View All</small></a> Notifications </div>
                                <div class="scrollDiv">
                                    <div class="notification-list">
                                        <a href="javascript: void(0);" class="clearfix">
                                            <span class="notification-icon"><i class="icon-cloud-upload text-primary"></i></span>                                                 
                                            <span class="notification-title">Upload Complete</span>
                                            <span class="notification-description">Praesent dictum nisl non est sagittis luctus.</span>
                                            <span class="notification-time">40 minutes ago</span>
                                        </a>
                                        <a href="javascript: void(0);" class="clearfix">
                                            <span class="notification-icon"><i class="icon-info text-warning"></i></span>                                                 
                                            <span class="notification-title">Storage Space low</span>
                                            <span class="notification-description">Praesent dictum nisl non est sagittis luctus.</span>
                                            <span class="notification-time">40 minutes ago</span>
                                        </a>
                                        <a href="javascript: void(0);" class="clearfix">
                                            <span class="notification-icon"><i class="icon-check text-success"></i></span>                                                 
                                            <span class="notification-title">Project Task Complete </span>
                                            <span class="notification-description">Praesent dictum nisl non est sagittis luctus.</span>
                                            <span class="notification-time">40 minutes ago</span>
                                        </a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript: void(0);" class="right-sidebar-toggle"><i class="glyphicon glyphicon-align-right"></i></a>
                    </li>
                    <li class="dropdown avtar-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../public/images/logo.png" class="img-circle" width="30" alt="">
                        </a>
                        <ul class="dropdown-menu top-dropdown">
                            <li><a href="javascript: void(0);"><i class="icon-home"></i> </*?php echo $c_tienda->getNombre_comercial();*/?></a></li>
                            <li><a href="javascript: void(0);"><i class="icon-user"></i> Perfil</a></li>
                            <li><a href="javascript: void(0);"><i class="icon-settings"></i> Configuracion</a></li>
                            <li class="divider"></li>
                            <!--li><a href="procesos/logout.php"><i class="icon-logout"></i> Cerrar Sesion</a></li-->
                        </ul>
                    </li>

                </ul> 
            </div>
        </div>
    </div>
</div>
<!-- top bar end-->