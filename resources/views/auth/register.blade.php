<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>
<body class="bg-gray-200">
  <main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-100" style="background: linear-gradient(135deg,rgb(240, 245, 247), #F0F8FF);">
      <span class="mask opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1" style="background-color: #5DADE2;">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">REGISTER</h4>
                </div>
              </div>
              <div class="card-body">
              <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="nama" class="form-control border shadow-sm" id="nama" placeholder="Nama" required>
                            <label for="nama">Nama</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control border shadow-sm" id="email" placeholder="Email" required>
                            <label for="email">Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control border shadow-sm" id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation" class="form-control border shadow-sm" id="password_confirmation" placeholder="Konfirmasi Password" required>
                            <label for="password_confirmation">Konfirmasi Password</label>
                        </div>

                        <div class="form-check form-check-info text-start ps-0">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                            <label class="form-check-label" for="flexCheckDefault">
                                Saya setuju dengan <a href="javascript:;" class="text-dark font-weight-bolder">syarat dan ketentuan</a>
                            </label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn w-100 my-4 mb-2" style="background-color: #5DADE2; color: white;">Register</button>
                        </div>
                    </form>

                    <p class="mt-4 text-sm text-center">
                        Sudah memiliki akun?
                        <a href="{{ route('login') }}" class="text-info text-gradient font-weight-bold">Login</a>
                    </p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
