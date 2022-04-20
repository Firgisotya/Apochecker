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

    <!-- Data -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Data</span>
    </li>
    <!-- Persediaan -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-spreadsheet"></i>
        <div data-i18n="Persediaan">Persediaan</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Data Persediaan">Data Persediaan</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Grafik Persediaan">Grafik Persediaan</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Permintaan -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-spreadsheet"></i>
        <div data-i18n="Permintaan">Permintaan</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Data Permintaan">Data Permintaan</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Grafik Permintaan">Grafik Permintaan</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Produksi -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-spreadsheet"></i>
        <div data-i18n="Produksi">Produksi</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Data Produksi">Data Produksi</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Grafik Produksi">Grafik Produksi</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Manajemen -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Manajemen</span>
    </li>
    <!-- Manajemen -->
    <li
      class="menu-item {{ Request::is('admin/obat') || Request::is('admin/category') || Request::is('admin/news') ? 'active' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-cabinet"></i>
        <div data-i18n="Manajemen">Manajemen</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="/admin/user" class="menu-link">
            <div data-i18n="User">User</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="/admin/product" class="menu-link">
            <div data-i18n="Obat">Product</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="/admin/category" class="menu-link">
            <div data-i18n="Kategori">Kategori</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="/admin/news" class="menu-link">
            <div data-i18n="Kategori">News</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Transaksi -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-package"></i>
        <div data-i18n="Transaksi">Transaksi</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="/admin/stok" class="menu-link">
            <div data-i18n="Tambah Stok">Tambah Stok</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Laporan -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-receipt"></i>
        <div data-i18n="Laporan">Laporan</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Histori Tambah Stok">Histori Tambah Stok</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Histori Penjualan">Histori Penjualan</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Manajemen -->
    {{-- <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Manajemen</span>
    </li>
    <!-- Manajemen -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-cabinet"></i>
        <div data-i18n="Manajemen">Manajemen</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="/admin/user" class="menu-link">
            <div data-i18n="User">User</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="/admin/obat" class="menu-link">
            <div data-i18n="Obat">Obat</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="/admin/kategori" class="menu-link">
            <div data-i18n="Kategori">Kategori</div>
          </a>
        </li>
      </ul>
    </li> --}}
    {{-- <!-- Transaksi -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-package"></i>
        <div data-i18n="Transaksi">Transaksi</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Tambah Stok">Tambah Stok</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Laporan -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-receipt"></i>
        <div data-i18n="Laporan">Laporan</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Histori Tambah Stok">Histori Tambah Stok</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Histori Penjualan">Histori Penjualan</div>
          </a>
        </li>
      </ul>
    </li> --}}


    <!-- Fuzzy -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Fuzzy</span></li>
    <li class="menu-item">
      <a href="" target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-bar-chart-square"></i>
        <div data-i18n="Support">Fuzzy</div>
      </a>
    </li>
  </ul>
</aside>
<!-- / Menu -->
