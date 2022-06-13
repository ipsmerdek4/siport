<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg bg-primary"></div>

      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="<?= base_url() ?>/" class="navbar-brand sidebar-gone-hide ml-5">SIPORT</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <form class="form-inline mr-lg-auto ml-lg-0  " action="<?= base_url() ?>" method="post">
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="450">
            <button class="btn" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </form>
        <ul class="navbar-nav navbar-right mr-lg-5">
          <li>
            <button id="regsub" class="btn btn-danger shadow-none px-3 d-lg-inline-block mt-lg-1 mr-3 mr-lg-0" type="submit">
              <span class="ion-load-c d-inline-block float-left p-0 my-0 mr-2" data-pack="ios" data-tags="security, padlock, safe" style="font-size:20px;text-shadow:1px 1px #6b6b6b; ">
              </span>
              <div class="float-left p-0 m-0 " style="text-shadow:1px 1px #6b6b6b;">Register</div>
            </button>
          </li>
          <li class="d-none d-lg-inline-block">
            <button id="logsub" class="btn btn-outline-success  mt-lg-1 text-white ml-lg-3 pt-lg-1 pb-lg-1 border border-white">
              <span class="ion ion-log-in d-inline-block float-left p-0 my-0 ml-2 mr-2 " data-pack="ios" data-tags="security, padlock, safe" style="font-size:25px; "></span>
              <div class=" float-left p-0 my-0 mr-2 mt-0" style="font-size:14px; ">Login</div>
            </button>
          </li>
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="menu-header d-lg-none">Auth</li>
            <li class="nav-item d-lg-none">
              <a href="<?= base_url() ?>/login" class="nav-link font-weight-bold text-dark">
                <i class="ion ion-log-in"></i>
                <span clas="mt-0 ">Login</span>
              </a>
            </li>
            <li class="menu-header d-lg-none">Page</li>
            <li class="nav-item active">
              <a href="#" class="nav-link">
                <i class="ion ion-android-car"></i>
                <span>Tour</span>
              </a>
            </li>
          </ul>
          <ul class=" border m-2">
            <li class="">asdasd</li>
          </ul>

        </div>
      </nav>

      <!--  -->
      <div class="main-content">
        <section class="section">