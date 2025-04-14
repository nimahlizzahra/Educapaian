<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Data Pencapaian</title>

  <!-- Fonts and Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <!-- CSS -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-200">
  <!-- Sidebar -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-xl-none" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="https://demos.creative-tim.com/material-dashboard/pages/dashboard" target="_blank">
        <img src="./assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">EDUCAPAIAN</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('dashboard') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('siswas.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Data Siswa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('gurus.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Data Guru</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('prestasis.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Capai Siswa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('capaians.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Capai Guru</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="{{ route('laporan.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Laporan Pencapaian</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0">
      <div class="mx-3">
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn bg-gradient-primary mt-4 w-100">
            <i class="fas fa-sign-out-alt"></i> Log Out
          </button>
        </form>
      </div>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg px-4 py-4">
    <h2>Laporan Bulanan</h2>
    <form method="GET" action="{{ route('laporan.index') }}" class="mb-4">
  <label for="bulan">Bulan:</label>
  <input type="month" id="bulan" name="bulan" required value="{{ request()->bulan }}">
  <button type="submit" class="btn btn-primary btn-sm ms-2">Lihat</button>
</form>
@if(request()->bulan)
        <form method="GET" action="{{ route('laporan.exportPdf') }}" target="_blank">
            <input type="hidden" name="bulan" value="{{ request()->bulan }}">
            <button type="submit" class="btn btn-danger mb-3">
            <i class="bi bi-file-earmark-pdf"></i> CPDF
            </button>
        </form>
        @endif

@if(request()->bulan)
  <div class="card p-4 mb-4">
    <h5>Hasil Laporan untuk Bulan: <strong>{{ \Carbon\Carbon::parse(request()->bulan . '-01')->translatedFormat('F Y') }}</strong></h5>
    
    <!-- Tabel Prestasi Siswa -->
    <h6 class="mt-4">Prestasi Siswa</h6>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Prestasi</th>
          <th>Penyelenggara</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($prestasis as $p)
          <tr>
            <td>{{ $p->siswa->nama_siswa }}</td>
            <td>{{ $p->jenis_prestasi }}</td>
            <td>{{ $p->penyelenggara }}</td>
            <td>{{ \Carbon\Carbon::parse($p->tanggal_raih_prestasi)->translatedFormat('d M Y') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center">Tidak ada data prestasi siswa di bulan ini.</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <!-- Tabel Capaian Guru -->
    <h6 class="mt-4">Capaian Guru</h6>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Capaian</th>
          <th>Penyelenggara</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($capaians as $c)
          <tr>
            <td>{{ $c->guru->nama_guru }}</td>
            <td>{{ $c->jenis_capaian }}</td>
            <td>{{ $c->penyelenggara }}</td>
            <td>{{ \Carbon\Carbon::parse($c->tanggal)->translatedFormat('d M Y') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center">Tidak ada data capaian guru di bulan ini.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endif


    <!-- Chart Containers -->
    <canvas id="chart-bars" class="mb-4" height="100"></canvas>
    <canvas id="chart-line" class="mb-4" height="100"></canvas>
    <canvas id="chart-line-tasks" class="mb-4" height="100"></canvas>
  </main>

  <!-- Scripts -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Chart Scripts -->
  <script>
    const ctx1 = document.getElementById("chart-bars").getContext("2d");
    new Chart(ctx1, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          data: [50, 20, 10, 22, 50, 10, 40],
          backgroundColor: "rgba(255, 255, 255, .8)",
          borderRadius: 4,
          maxBarThickness: 6
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { ticks: { color: "#fff", beginAtZero: true }, grid: { color: "rgba(255,255,255,.2)" } },
          x: { ticks: { color: "#f8f9fa" }, grid: { color: "rgba(255,255,255,.2)" } }
        },
        plugins: { legend: { display: false } }
      }
    });

    const ctx2 = document.getElementById("chart-line").getContext("2d");
    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          borderColor: "rgba(255, 255, 255, .8)",
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          fill: true,
          tension: 0,
          borderWidth: 4
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          y: { ticks: { color: "#f8f9fa" }, grid: { color: "rgba(255,255,255,.2)" } },
          x: { ticks: { color: "#f8f9fa" }, grid: { display: false } }
        }
      }
    });

    const ctx3 = document.getElementById("chart-line-tasks").getContext("2d");
    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          borderColor: "rgba(255, 255, 255, .8)",
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          fill: true,
          tension: 0,
          borderWidth: 4
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          y: { ticks: { color: "#f8f9fa" }, grid: { color: "rgba(255,255,255,.2)" } },
          x: { ticks: { color: "#f8f9fa" }, grid: { display: false } }
        }
      }
    });
  </script>
</body>

</html>
