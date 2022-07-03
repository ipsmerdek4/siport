<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg bg-primary"></div>

      <nav class="navbar navbar-expand-lg main-navbar">
        <div class="mx-lg-5 px-lg-5 d-none d-xl-inline-block "></div>

        <a href="<?= base_url() ?>/" class="navbar-brand sidebar-gone-hide ">SIPORT</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <form class="form-inline mr-lg-auto ml-lg-0  " action="<?= base_url() ?>" method="post">

        </form>
        <ul class="navbar-nav navbar-right mr-lg-5">
            
          <li class="dropdown mr-xl-5">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user  mr-xl-5 ">
              <img alt="image" src="<?= base_url() ?>/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, <?= $user ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <?php
              $menit = 0;
              if ($timesaatlog < $timesaatini) {
                $diff = $timesaatini - $timesaatlog;
                $jam = floor($diff / (60 * 60));
                $menit = $diff - $jam * (60 * 60);
              }
              ?>
              <div class="dropdown-title">Logged in <?= floor($menit / 60) ?> min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url() ?>/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
          <li class="mr-xl-5 d-none d-lg-inline-block"></li>

        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg ">
        <div class="container ">
          <ul class="navbar-nav">
            <li class="menu-header d-lg-none">Page</li>
            <li class="nav-item active">
              <a href="<?=base_url()?>" class="nav-link">
                <i class="ion ion-android-car"></i>
                <span>Tour</span>
              </a>
            </li>
            <li class="nav-item d-xl-none">
              <a href="<?=base_url()?>/myorder" class="nav-link">
                <i class="ion ion-clipboard"></i>
                <span>My Order</span>
              </a>
            </li>


          </ul>
          <ul class="m-2 list-unstyled d-none d-xl-inline-block ">

            <li class="nav-item nav-right ">
              <a href="<?=base_url()?>/myorder" class="nav-link "  >
                <div class="d-myorder font-weight-bold">
                  <i class="ion-clipboard float-left d-myorder-head"></i> 
                  <div class="d-myorder-fot float-left">
                    <span>My Order</span>
                  </div>
                </div>
              </a>
            </li> 

          </ul>

        </div>
      </nav>



      <div class="main-content">
        <section class="section">