<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url() ?>">SIPORT</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url() ?>">SPT</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item  <?php echo $menu == 'home' ? 'active' : '' ?> ">
                <a href="<?= base_url() ?>" class="nav-link pl-1">
                    <i class="fa fa-fire ml-3"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Pages Data</li>
            <li class="nav-item  <?php echo $menu == 'destination' ? 'active' : '' ?> ">
                <a href="<?= base_url() ?>/destination" class="nav-link pl-1">
                    <i class="fa fa-fire ml-3"></i>
                    <span>Destination</span>
                </a>
            </li>
            <li class="nav-item  <?php echo $menu == 'vehicle' ? 'active' : '' ?> ">
                <a href="<?= base_url() ?>/vehicle" class="nav-link pl-1">
                    <i class="fa fa-fire ml-3"></i>
                    <span>Vehicle</span>
                </a>
            </li>
            <li class="nav-item  <?php echo $menu == 'driver' ? 'active' : '' ?> ">
                <a href="<?= base_url() ?>/driver" class="nav-link pl-1">
                    <i class="fa fa-fire ml-3"></i>
                    <span>Driver</span>
                </a>
            </li>
            <li class="nav-item  <?php echo $menu == 'departure' ? 'active' : '' ?> ">
                <a href="<?= base_url() ?>/departure" class="nav-link pl-1">
                    <i class="fa fa-fire ml-3"></i>
                    <span>Departure</span>
                </a>
            </li>

            <!-- 
            <li class="nav-item dropdown  <?php echo $menu == 'destination' || $menu == 'vehicle' ? 'active' : '' ?> ">
                <a href="#" class="nav-link has-dropdown pl-1">
                    <i class="fa fa-car ml-3"></i>
                    <span>Data Tours</span>
                </a>
                <ul class="dropdown-menu">
                    <li class=" <?php echo $menu == 'destination' ? 'active' : '' ?>  ">
                        <a class="nav-link beep beep-sidebar" href="<?= base_url() ?>/destination">Destination</a>
                    </li>
                    <li class=" pb-1 pt-0 <?php echo $menu == 'vehicle' ? 'active' : '' ?>  ">
                        <a class="nav-link beep beep-sidebar" href="<?= base_url() ?>/vehicle">Vehicle</a>
                    </li>
                    <hr class="m-0 mr-5 float-right border-bottom-1 border-primary" style="width:55%">
                    <li class="py-2 <?php echo $menu == 'departure' ? 'active' : '' ?>  ">
                        <a class="nav-link" href="<?= base_url() ?>/departure">Departure</a>
                    </li>
                </ul>
            </li>
 -->



        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">

        </div>
    </aside>
</div>