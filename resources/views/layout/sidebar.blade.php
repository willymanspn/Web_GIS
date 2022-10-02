    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item me-auto"><a class="navbar-brand" href="/"><span class="brand-logo">
              <img src="../../../app-assets/images/logo/logo.png" alt="" height="30">
                </span>
              <h2 class="brand-text">Web SIG</h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="{{ Request::is('/','dashboard')? "active":"nav-item" }}"><a class="d-flex align-items-center" href="/"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
          </li>
          <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i data-feather="more-horizontal"></i>
          </li>
          <li class="{{ Request::is('/gis')? "active":"" }}"><a class="d-flex align-items-center" href="/gis"><i data-feather='thermometer'></i><span class="menu-title text-truncate" data-i18n="Email">Suhu Dan Kelembapan</span></a>
          </li>
          <li class="{{ Request::is('/hotel')? "active":"" }}"><a class="d-flex align-items-center" href="/hotel"><i data-feather="map"></i><span class="menu-title text-truncate" data-i18n="Chat">Sebaran Hotel</span></a>
          </li>
        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->
