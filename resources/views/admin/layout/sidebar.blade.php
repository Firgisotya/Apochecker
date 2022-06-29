<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="/dashboard" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{ asset('img/favicon.png') }}" alt="" width="50px">
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2">Apochecker</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
      <a href="/dashboard" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <li class="menu-item ">
      <a href="/" class="menu-link {{ Request::is('/') ? 'active' : '' }}">
        <i class="menu-icon tf-icons bx bx-home-alt"></i>
        <div data-i18n="Analytics">Homepage</div>
      </a>
    </li>
    <li class="menu-item ">
        <a href="/chatify" class="menu-link {{ Request::is('/chatify') ? 'active' : '' }}">
          <i class="menu-icon tf-icons bx bx-chat"></i>
          <div data-i18n="Analytics">Chat</div>
        </a>
      </li>

    <!-- Manajemen -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Manajemen</span>
    </li>
    <!-- Manajemen -->
    <li
      class="menu-item {{ Request::is('admin/product') || Request::is('admin/category') || Request::is('admin/news') || Request::is('admin/contact') || Request::is('admin/user') ? 'active' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-cabinet"></i>
        <div data-i18n="Manajemen">Manajemen</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ Request::is('admin/user') ? 'active' : '' }}">
          <a href="/admin/user" class="menu-link">
            <div data-i18n="User">User</div>
          </a>
        </li>
        <li class="menu-item {{ Request::is('admin/product') ? 'active' : '' }}">
          <a href="/admin/product" class="menu-link">
            <div data-i18n="Obat">Product</div>
          </a>
        </li>
        <li class="menu-item {{ Request::is('admin/category') ? 'active' : '' }}">
          <a href="/admin/category" class="menu-link">
            <div data-i18n="Kategori">Kategori</div>
          </a>
        </li>
        <li class="menu-item {{ Request::is('admin/news') ? 'active' : '' }}">
          <a href="/admin/news" class="menu-link">
            <div data-i18n="Kategori">News</div>
          </a>
        </li>
        <li class="menu-item {{ Request::is('admin/contact') ? 'active' : '' }}">
          <a href="/admin/contact" class="menu-link">
            <div data-i18n="Kategori">Contact</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Transaksi -->
    <li class="menu-item {{ Request::is('admin/stok') ? 'active' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-package"></i>
        <div data-i18n="Transaksi">Transaksi</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ Request::is('admin/stok') ? 'active' : '' }}">
          <a href="/admin/stok/create" class="menu-link">
            <div data-i18n="Tambah Stok">Tambah Stok</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Laporan -->
    <li class="menu-item {{ Request::is('admin/histori_penjualan') ? 'active' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-receipt"></i>
        <div data-i18n="Laporan">Laporan</div>
      </a>
      <ul class="menu-sub ">
        <li class="menu-item">
          <a href="/admin/histori_stok" class="menu-link">
            <div data-i18n="Histori Tambah Stok">Histori Tambah Stok</div>
          </a>
        </li>
        <li class="menu-item {{ Request::is('admin/order') ? 'active' : '' }}">
          <a href="/admin/order" class="menu-link active">
            <div data-i18n="Histori Penjualan">Histori Penjualan</div>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</aside>
<!-- / Menu -->
