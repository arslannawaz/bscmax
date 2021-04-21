<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text ">Admin <font style="color: #FD5814">Panel</font></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


             
           <li class="nav-item has-treeview">
            <a href="{{url('admin')}}" class="nav-link  @if (session('page')=='dashboard') active @endif">
             <i class="nav-icon fas fa-tachometer-alt" aria-hidden="true"></i>
              <p>
                Dashboard
              </p>
            </a>

          </li>
          <li class="nav-item has-treeview">
            <a href="{{url('admin/users')}}" class="nav-link  @if (session('page')=='users') active @endif">
             <i class="fa fa-user nav-icon" aria-hidden="true"></i>
              <p>
                User
              </p>
            </a>

          </li>
          <li class="nav-item has-treeview">
            <a href="{{url('admin/projects')}}" class="nav-link  @if (session('page')=='projects') active @endif">
             <i class="fas fa-file nav-icon" aria-hidden="true"></i>
              <p>
                Add Project
              </p>
            </a>

          </li>
          <li class="nav-item has-treeview">
            <a href="{{url('admin/project-opened')}}" class="nav-link  @if (session('page')=='opened') active @endif">
             <i class="fas fa-file nav-icon" aria-hidden="true"></i>
              <p>
              Project Opened
              </p>
            </a>

          </li>
          <li class="nav-item has-treeview">
            <a href="{{url('admin/wallets')}}" class="nav-link  @if (session('page')=='wallets') active @endif">
             <i class="fas fa-wallet nav-icon" aria-hidden="true"></i>
              <p>
                Wallets
              </p>
            </a>

          </li>
          <li class="nav-item has-treeview">
            <a href="{{url('admin/claim')}}" class="nav-link  @if (session('page')=='claim') active @endif">
             <i class="fa fa-key nav-icon" aria-hidden="true"></i>
              <p>
                Claim Token
              </p>
            </a>

          </li>
          <li class="nav-item has-treeview">
            <a href="{{url('admin/refunds')}}" class="nav-link  @if (session('page')=='refunds') active @endif">
             <i class="fas fa-exchange-alt nav-icon" aria-hidden="true"></i>
              <p>
                Refund
              </p>
            </a>

          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('admin/change-password') }}" class="nav-link  @if (session('page')=='password') active @endif">
             <i class="fa fa-lock nav-icon" aria-hidden="true"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>