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
                    <i class="icon ion-star ml-3 mt-1"></i>  
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Pages Data</li>
            <li class="nav-item  <?php echo $menu == 'destination' ? 'active' : '' ?> ">
                <a href="<?= base_url() ?>/destination" class="nav-link pl-1">
                    <i class="icon ion-flag ml-3 mt-1"></i>  
                    <span>Destination</span>
                </a>
            </li>
            <li class="nav-item  <?php echo $menu == 'vehicle' ? 'active' : '' ?> ">
                <a href="<?= base_url() ?>/vehicle" class="nav-link pl-1">
                    <i class="icon ion-model-s ml-3 mt-1"></i>  
                    <span>Vehicle</span>
                </a>
            </li>
            <li class="nav-item  <?php echo $menu == 'driver' ? 'active' : '' ?> ">
                <a href="<?= base_url() ?>/driver" class="nav-link pl-1">
                    <i class="icon ion-ios-people ml-3 mt-1"></i>  
                    <span>Driver</span>
                </a>
            </li>
            <li class="nav-item  <?php echo $menu == 'departure' ? 'active' : '' ?> ">
                <a href="<?= base_url() ?>/departure" class="nav-link pl-1">
                    <i class="icon ion-android-checkmark-circle ml-3 mt-1"></i>  
                    <span>Departure</span>
                </a>
            </li>
 


        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">

        </div>
    </aside>
</div>