<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg bg-primary"></div>

      <nav class="navbar navbar-expand-lg main-navbar">
        <div class="mx-lg-5 px-lg-5 d-none d-xl-inline-block "></div>
        <a href="<?= base_url() ?>/" class="navbar-brand sidebar-gone-hide">SIPORT</a>

        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <div class="form-inline mr-lg-auto ml-lg-0  "  >

        </div>
        <ul class="navbar-nav navbar-right mr-xl-5">

          <!--     <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
              <div class=" d-inline-block d-lg-none mt-1">Rp</div>
              <div class="d-sm-none d-lg-inline-block mt-2">[ Rp ] - IDR </div>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-title">
                <a href="">IDR - Rupiah Indonesia</a>
              </div>
              <div class="dropdown-title">
                <a href="">USD - US Dollar</a>
              </div>
            </div>
          </li>
 -->


          <li class="mr-xl-5">
            <button id="regsub" class="btn btn-danger shadow-none px-3 d-lg-inline-block mt-lg-1 mr-3 mr-xl-5" type="submit">
              <span class="ion-load-c d-inline-block float-left p-0 my-0 mr-2" data-pack="ios" data-tags="security, padlock, safe" style="font-size:20px;text-shadow:1px 1px #6b6b6b; ">
              </span>
              <div class="float-left p-0 m-0 " style="text-shadow:1px 1px #6b6b6b;">Register</div>
            </button>
          </li>
          <li class="mr-xl-5 d-none d-lg-inline-block"></li>
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
              <a href="<?= base_url() ?>" class="nav-link">
                <i class="ion ion-android-car"></i>
                <span>Tour</span>
              </a>
            </li>
          </ul>

          <ul class=" m-2 list-unstyled d-none d-xl-inline-block ">
            <li class="border border-white" style="margin-top: 6px;">
              <a href="<?php base_url() ?>/login" class="nav-link nav-link-lg clearfix mt-3 hoverborder">
                <div class="text-hover">
                  <i class="fa fa-sign-in-alt float-left mr-2"></i>
                  <p class="float-left  mr-2">Login</p>
                </div>
              </a>
            </li>
          </ul>

        </div>
      </nav>

      <!--  -->
      <div class="main-content">
        <section class="section">