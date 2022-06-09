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
                <a href="<?= base_url() ?>" class="nav-link">
                    <i class="fa fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Pages</li>
            <li class="nav-item dropdown  <?php echo $menu == 'dataisland' ? 'active' : '' ?> ">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa fa-car"></i>
                    <span>Data Tours</span>
                </a>
                <ul class="dropdown-menu ">
                    <li class=" <?php echo $menu == 'dataisland' ? 'active' : '' ?>  ">
                        <a class="nav-link" href="<?= base_url() ?>/island">Island</a>
                    </li>
                    <li><a class="nav-link" href="<?= base_url() ?>">Location</a></li>
                </ul>
            </li>



        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">

        </div>
    </aside>
</div>