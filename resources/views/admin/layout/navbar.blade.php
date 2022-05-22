<!-- Navbar -->
@php
// Menghitung jumlah pendapatan di table order
$dt = Carbon\Carbon::now();
// Membuat jam hari ini
$jam = $dt->format('H:i');
$cuan = \App\Models\Order::where('status', 2)->sum('total');
@endphp
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
  id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-baseline" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
      <div class="d-flex">
        <h4 id="jam"></h4>
      </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto" style="transform: translateY(7.5px)">
      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <img src="{{ asset('storage/'.Auth::user() -> image) }}" alt class="w-px-40 h-auto rounded-circle" />
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="#">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online">
                    <img src="{{ asset('storage/'.Auth::user() -> image) }}" alt
                      class="w-px-40 h-auto rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <span class="fw-semibold d-block">{{ ucwords(Auth::user()->name) }}</span>
                  <small class="text-muted">{{ Auth::user()->level }}</small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              <i class="bx bx-user me-2"></i>
              <span class="align-middle">My Profile</span>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="bx bx-power-off me-2"></i>
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>

<!-- / Navbar -->

<script>
  const nama_hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
  const nama_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  function addZero(i){
    if(i < 10){
      i = "0" + i;
    }
    return i;
  }
  // Menampillkan jam menggunakan interval 
  setInterval(function() {
    var dt = new Date();
    var jam = addZero(dt.getHours());
    var menit = addZero(dt.getMinutes());
    var detik = addZero(dt.getSeconds());
    var hari = nama_hari[dt.getDay()];
    var tanggal = dt.getDate();
    var bulan = nama_bulan[dt.getMonth()];
    var tahun = dt.getFullYear();
    var jam_format = jam + " : " + menit + " : " + detik;
    var hari_format = hari + ", " + tanggal + " " + bulan + " " + tahun;
    document.getElementById("jam").innerHTML = ` <strong>${jam_format}</strong> <br>${hari_format}`;
  }, 1000);
</script>