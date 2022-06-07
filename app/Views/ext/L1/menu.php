
<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg bg-primary"></div>

      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="<?=base_url()?>/" class="navbar-brand sidebar-gone-hide ml-5">SIPORT</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>  
        <form class="form-inline mr-lg-auto ml-lg-0  " action="<?=base_url()?>" method="post"> 
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="450">
            <button class="btn" type="submit">
              <i class="fas fa-search"></i>
            </button> 
          </div>
        </form> 
        <ul class="navbar-nav navbar-right mr-lg-5">  
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?=base_url()?>/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, <?=$user?></div></a>
              <div class="dropdown-menu dropdown-menu-right">

                <?php
                  $menit = 0;
                  if ($timesaatlog < $timesaatini) {
                    $diff = $timesaatini - $timesaatlog;
                    $jam = floor($diff / (60 * 60));
                    $menit = $diff - $jam * (60 * 60); 
                  }  
                ?>
                <div class="dropdown-title">Logged in <?=floor($menit/60)?> min ago</div>
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
                <a href="<?=base_url()?>/logout" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </div>
            </li> 
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">  
            <li class="menu-header d-lg-none">Page</li> 
            <li class="nav-item active">
              <a href="#" class="nav-link">
                <i class="ion ion-android-car"></i>
                <span>Tour</span>
              </a>
            </li> 
          </ul>
        </div>
      </nav>
