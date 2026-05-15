<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('home') }}">Mini Project</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('home') }}">MP</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="active">
        <a href="{{ route('user.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>

      <li class="menu-header">Menu</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-laptop"></i> <span>PC</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="#">Daftar PC</a></li>
          <li><a class="nav-link" href="#">Peminjaman Saya</a></li>
          <li><a class="nav-link" href="#">Riwayat</a></li>
        </ul>
      </li>

      <li class="menu-header">Settings</li>
      <li>
        <a href="#" class="nav-link"><i class="fas fa-user"></i> <span>Profile</span></a>
      </li>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="{{ route('logout') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </ul>
  </aside>
</div>