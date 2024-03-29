
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url('assets/adminassets/dist/img/Syncologo.png')}}" alt="SyncoLogo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Synco</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('assets/adminassets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @if(Auth::user()->user_type == 1)
        <li class="nav-item">
            <a href="{{url ('admin/dashboard')}}" class="nav-link @if(Request::segment(2) =='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="{{url ('admin/admin/list')}}" class="nav-link @if(Request::segment(2) =='admin') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Admin
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url ('admin/student/list')}}" class="nav-link @if(Request::segment(2) =='studentList') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Users
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url ('student/project/list')}}" class="nav-link @if(Request::segment(2) =='classList') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Project Created
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url ('admin/class/list')}}" class="nav-link @if(Request::segment(2) =='classList') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Account
              </p>
            </a>
        </li>

        @elseif(Auth::user()->user_type == 3)
        <li class="nav-item">
            <a href="{{url ('student/dashboard')}}" class="nav-link @if(Request::segment(2) =='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Projects
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url ('student/project/list')}}" class="nav-link @if(Request::segment(2) =='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Create Project
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url ('/profile')}}" class="nav-link @if(Request::segment(2) =='dashboard') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url ('student/dashboard')}}" class="nav-link @if(Request::segment(2) =='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>


        @endif
        <li class="nav-item">
            <a href="{{url ('logout')}}" class="nav-link ">
              <i class="nav-icon far fa-user"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
