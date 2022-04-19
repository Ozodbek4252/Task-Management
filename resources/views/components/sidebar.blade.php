<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

  <!-- LOGO -->
  <div class="navbar-brand-box">
      <a href="index.html" class="logo logo-dark">
          {{-- <span class="logo-sm">
              <img src="assets/images/logo-sm.png" alt="" height="22">
          </span>
          <span class="logo-lg">
              <img src="assets/images/logo-dark.png" alt="" height="20" style="height: 20px;">
          </span> --}}
      </a>

      <a href="index.html" class="logo logo-light">
          {{-- <span class="logo-sm">
              <img src="assets/images/logo-sm.png" alt="" height="22">
          </span>
          <span class="logo-lg">
              <img src="assets/images/logo-light.png" alt="" height="20">
          </span> --}}
      </a>
  </div>

  <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
      <i class="fa fa-fw fa-bars"></i>
  </button>

  <div data-simplebar class="sidebar-menu-scroll">

      <!--- Sidemenu -->
      <div id="sidebar-menu">
          <!-- Left Menu Start -->
          <ul class="metismenu list-unstyled" id="side-menu">
              <li class="menu-title">Menu</li>

              <li>
                  <a href="{{route('dashboard')}}">
                      <i class="uil-home-alt"></i>
                      <span>Dashboard</span>
                  </a>
              </li>

              <li class="menu-title">Apps</li>

              <li>
                  <a href="{{ route('projects.index') }}" class="waves-effect">
                      <i class="bx bx-bar-chart-square"></i> Projects
                  </a>
              </li>
              <li>
                  <a href="{{ route('tasks.index') }}" class="waves-effect">
                      <i class="bx bx-task"></i> Tasks
                  </a>
              </li>


          </ul>
      </div>
  </div>
</div>