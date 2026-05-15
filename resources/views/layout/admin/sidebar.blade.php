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
        <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>

      <li class="menu-header">Management</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('users.index') }}">Daftar User</a></li>
          <li><a class="nav-link" href="{{ route('users.create') }}">Tambah User</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-laptop"></i> <span>PC</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="#">Daftar PC</a></li>
          <li><a class="nav-link" href="#">Tambah PC</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-building"></i> <span>Ruangan</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="#">Daftar Ruangan</a></li>
          <li><a class="nav-link" href="#">Tambah Ruangan</a></li>
        </ul>
      </li>

      <li class="menu-header">Reports</li>
      <li>
        <a href="#" class="nav-link"><i class="fas fa-file-alt"></i> <span>Laporan Peminjaman</span></a>
      </li>
      <li>
        <a href="#" class="nav-link"><i class="fas fa-history"></i> <span>Activity Log</span></a>
      </li>

      <li class="menu-header">Settings</li>
      <li>
        <a href="#" class="nav-link"><i class="fas fa-cog"></i> <span>Pengaturan</span></a>
      </li>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-danger w-100" style="margin-top: 5px; text-decoration: none; display: inline-block; text-align: center;">
          Logout
        </a>
      </div>
    </ul>
  </aside>
</div>