







<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=SITE_URL;?>" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">ADMIN PANEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$userInfo['name']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Menyular
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Müşteri Yönetimi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?mode=musteri/ekle" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Müşteri Ekle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?mode=musteri/listele" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Müşteri Listesi</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Müşteri İşlem Yönetimi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?mode=islem/ekle" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>İşlem Ekle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?mode=islem/listele" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>İşlem Listesi</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Raporlar Yönetimi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?mode=raporlar/musteri" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Müşteri Rapor</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?mode=raporlar/log" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>LOG</p>
                            </a>
                        </li>
                    </ul>
                </li>







                <li class="nav-header">İŞLEM</li>
                <li class="nav-item">
                    <a href="<?=SITE_URL;?>/cixis.php" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Çıxış</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
