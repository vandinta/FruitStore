<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo mt-1 ml-4" href="index.html">
      <h2 style="color: white;">FruitStore</h2>
    </a>
    <a class="sidebar-brand brand-logo-mini mt-1" href="index.html">
      <h3 style="color: white;">FS</h3>
    </a>
  </div>
  <ul class="nav">
    <div class="dropdown-divider"></div>
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <h3 style="color: white;">Ad</h3>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
            <span>Admin</span>
          </div>
        </div>
      </div>
    </li>
    <div class="dropdown-divider"></div>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('product.index') }}">
        <span class="menu-icon">
          <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">Produk</span>
      </a>
    </li>
  </ul>
</nav>