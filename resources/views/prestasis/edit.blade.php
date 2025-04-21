<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>Edit Data Pencapaian Siswa</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">EDUCAPAIAN</span>
      </a>
    </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse w-auto max-height-vh-100">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('dashboard') }}">
          <i class="material-icons opacity-10">dashboard</i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('siswas.index') }}">
          <i class="material-icons opacity-10">table_view</i> Data Siswa
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('gurus.index') }}">
          <i class="material-icons opacity-10">receipt_long</i> Data Guru
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white active bg-gradient-primary" href="{{ route('prestasis.index') }}">
          <i class="material-icons opacity-10">view_in_ar</i> Capai Siswa
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('capaians.index') }}">
          <i class="material-icons opacity-10">format_textdirection_r_to_l</i> Capai Guru
        </a>
      </li>

      
    <div class="sidenav-footer position-absolute w-100 bottom-0">
      <div class="mx-3">
        <!-- Tombol Log Out dengan logo atau ikon -->
        <a class="btn bg-gradient-primary mt-4 w-100" href="logout-url" type="button">
          <i class="fas fa-sign-out-alt"></i> Log Out
        </a>
      </div>
    </div>
  </aside>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit pencapaian Siswa</h2>
        
        <div class="card">
            <div class="card-body">
                <!-- Form Edit Siswa -->
                <form action="{{ route('prestasis.update', $prestasi->prestasiID) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                    <label for="siswaID" class="form-label">Nama Siswa</label>
                    <select name="siswaID" id="siswaID" class="form-control" required>
                        <option value="" disabled>Pilih Siswa</option>
                        @foreach($siswas as $siswa)
                            <option value="{{ $siswa->siswaID }}" {{ $siswa->id == $prestasi->siswaID ? 'selected' : '' }}>
                                {{ $siswa->nama_siswa }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kategori_prestasi" class="form-label">Kategori Prestasi</label>
                    <select class="form-control" id="kategori_prestasi" name="kategori_prestasi" required onchange="updateBidang()">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Akademik" {{ old('kategori_prestasi', $prestasi->kategori_prestasi) == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="Non-Akademik" {{ old('kategori_prestasi', $prestasi->kategori_prestasi) == 'Non-Akademik' ? 'selected' : '' }}>Non-Akademik</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jenis_prestasi" class="form-label">Bidang Prestasi</label>
                    <select class="form-control" id="jenis_prestasi" name="jenis_prestasi" required>
                        <option value="">-- Pilih Bidang --</option>
                        <!-- Opsi akan terisi berdasarkan kategori yang dipilih -->
                        @if($prestasi->kategori_prestasi == 'Akademik')
                            <option value="Matematika" {{ old('jenis_prestasi', $prestasi->jenis_prestasi) == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                            <option value="Fisika" {{ old('jenis_prestasi', $prestasi->jenis_prestasi) == 'Fisika' ? 'selected' : '' }}>Fisika</option>
                            <option value="Kimia" {{ old('jenis_prestasi', $prestasi->jenis_prestasi) == 'Kimia' ? 'selected' : '' }}>Kimia</option>
                        @elseif($prestasi->kategori_prestasi == 'Non-Akademik')
                            <option value="Olahraga" {{ old('jenis_prestasi', $prestasi->jenis_prestasi) == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                            <option value="Seni" {{ old('jenis_prestasi', $prestasi->jenis_prestasi) == 'Seni' ? 'selected' : '' }}>Seni</option>
                            <option value="Pencak Silat" {{ old('jenis_prestasi', $prestasi->jenis_prestasi) == 'Pencak Silat' ? 'selected' : '' }}>Pencak Silat</option>
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_pencapaian" class="form-label">Tanggal Pencapaian</label>
                    <input type="date" name="tanggal_raih_prestasi" id="tanggal_pencapaian" class="form-control" value="{{ $prestasi->tanggal_raih_prestasi }}" required>
                </div>

                <div class="mb-3">
                    <label for="penyelenggara" class="form-label">Penyelenggara</label>
                    <input type="text" name="penyelenggara" id="penyelenggara" class="form-control" value="{{ $prestasi->penyelenggara }}" required>
                </div>

                <div class="mb-3">
                    <label for="penghargaan" class="form-label">Jenis Penghargaan</label>
                    <select name="penghargaan" id="penghargaan" class="form-control" required>
                        <option value="" disabled {{ empty($prestasi->penghargaan) ? 'selected' : '' }}>Pilih Penghargaan</option>
                        <option value="Medali" {{ $prestasi->penghargaan == 'Medali' ? 'selected' : '' }}>Medali</option>
                        <option value="Piala" {{ $prestasi->penghargaan == 'Piala' ? 'selected' : '' }}>Piala</option>
                        <option value="Sertifikat" {{ $prestasi->penghargaan == 'Sertifikat' ? 'selected' : '' }}>Sertifikat</option>
                        <option value="Piagam" {{ $prestasi->penghargaan == 'Piagam' ? 'selected' : '' }}>Piagam</option>
                        <option value="Trofi" {{ $prestasi->penghargaan == 'Trofi' ? 'selected' : '' }}>Trofi</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ $prestasi->deskripsi }}</textarea>
                </div>


                <!-- Tombol Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('prestasis.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script>
    function updateBidang() {
        var kategori = document.getElementById('kategori_prestasi').value;
        var jenis_prestasi = document.getElementById('jenis_prestasi');
        
        // Reset jenis prestasi
        jenis_prestasi.innerHTML = '<option value="">-- Pilih Bidang --</option>';
        
        if (kategori === 'Akademik') {
            jenis_prestasi.innerHTML += '<option value="Matematika">Matematika</option>';
            jenis_prestasi.innerHTML += '<option value="Fisika">Fisika</option>';
            jenis_prestasi.innerHTML += '<option value="Kimia">Kimia</option>';
        } else if (kategori === 'Non-Akademik') {
            jenis_prestasi.innerHTML += '<option value="Olahraga">Olahraga</option>';
            jenis_prestasi.innerHTML += '<option value="Seni">Seni</option>';
            jenis_prestasi.innerHTML += '<option value="Pencak Silat">Pencak Silat</option>';
        }
    }
</script>

    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["M", "T", "W", "T", "F", "S", "S"],
            datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "rgba(255, 255, 255, .8)",
            data: [50, 20, 10, 22, 50, 10, 40],
            maxBarThickness: 6
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                display: false,
            }
            },
            interaction: {
            intersect: false,
            mode: 'index',
            },
            scales: {
            y: {
                grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 10,
                font: {
                    size: 14,
                    weight: 300,
                    family: "Roboto",
                    style: 'normal',
                    lineHeight: 2
                },
                color: "#fff"
                },
            },
            x: {
                grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                display: true,
                color: '#f8f9fa',
                padding: 10,
                font: {
                    size: 14,
                    weight: 300,
                    family: "Roboto",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            },
        },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
            label: "Mobile apps",
            tension: 0,
            borderWidth: 0,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255, 255, 255, .8)",
            pointBorderColor: "transparent",
            borderColor: "rgba(255, 255, 255, .8)",
            borderColor: "rgba(255, 255, 255, .8)",
            borderWidth: 4,
            backgroundColor: "transparent",
            fill: true,
            data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
            maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                display: false,
            }
            },
            interaction: {
            intersect: false,
            mode: 'index',
            },
            scales: {
            y: {
                grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                display: true,
                color: '#f8f9fa',
                padding: 10,
                font: {
                    size: 14,
                    weight: 300,
                    family: "Roboto",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            x: {
                grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
                },
                ticks: {
                display: true,
                color: '#f8f9fa',
                padding: 10,
                font: {
                    size: 14,
                    weight: 300,
                    family: "Roboto",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            },
        },
        });

        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
            label: "Mobile apps",
            tension: 0,
            borderWidth: 0,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255, 255, 255, .8)",
            pointBorderColor: "transparent",
            borderColor: "rgba(255, 255, 255, .8)",
            borderWidth: 4,
            backgroundColor: "transparent",
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                display: false,
            }
            },
            interaction: {
            intersect: false,
            mode: 'index',
            },
            scales: {
            y: {
                grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                display: true,
                padding: 10,
                color: '#f8f9fa',
                font: {
                    size: 14,
                    weight: 300,
                    family: "Roboto",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            x: {
                grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
                },
                ticks: {
                display: true,
                color: '#f8f9fa',
                padding: 10,
                font: {
                    size: 14,
                    weight: 300,
                    family: "Roboto",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            },
        },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>
</html>



