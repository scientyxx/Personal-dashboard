<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://personal-dashboard.test/" class="brand-link" style="text-align: center!important;">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light" >Personal Dashboard</span>
    </a>

    <!-- Sidebar -->
    @php
            use Illuminate\Support\Facades\Auth;

            $user = Auth::user();
            $name = $user->name;
        @endphp
    <div class="sidebar">


      <div class="user-panel mt-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('image/profilepic.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Halo {{ $name }} !</a>
          <p style="color: white;"> Online</p>
        </div>
        {{-- <div class="info">
          <a href="#" class="d-block">121103011</a>
 {{-- </div> --}}
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               {{-- <li class="nav-item ">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Project
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-plus"></i>
                      <p>
                        Add Project
                      </p>
                    </a>
                  </li>
                </ul>
              </li> --}}


          {{-- <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon 	fas fa-chart-pie"></i>
              <p>
                Project
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <a href="#" class="nav-link ">
              <i class="nav-icon 	fas fa-chart-pie"></i>
              <p>
                Add Project
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
          </li> --}}
            {{-- {{-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    <!-- /.sidebar -->
  </aside>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('.nav-link').click(function(e) {
    e.preventDefault();
    var submenu = $(this).siblings('.nav-treeview');
    submenu.slideToggle();

    // Mengubah ikon panah sesuai keadaan submenu
    var icon = $(this).find('.right');
    if (icon.hasClass('fa-angle-right')) {
      icon.removeClass('fa-angle-right');
      icon.addClass('fa-angle-down');
    } else {
      icon.removeClass('fa-angle-down');
      icon.addClass('fa-angle-right');
    }
  });
});

</script>
