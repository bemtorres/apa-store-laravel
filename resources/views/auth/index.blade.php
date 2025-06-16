<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APA!</title>
  <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('vendors/simplebar/css/simplebar.css') }}">
  <link rel="stylesheet" href="{{ asset('template/css/vendors/simplebar.css') }}">
  <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('template/css/onlyone.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lato-font/3.0.0/css/lato-font.min.css" integrity="sha512-rSWTr6dChYCbhpHaT1hg2tf4re2jUxBWTuZbujxKg96+T87KQJriMzBzW5aqcb8jmzBhhNSx4XYGA6/Y+ok1vQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.cdnfonts.com/css/merriweather" rel="stylesheet">
  @include('layouts._css')
  <style>
    body {
      background: #f7f1de;
      font-family: 'Lato', 'Merriweather', sans-serif;
    }
    .login-container {
      display: flex;
      min-height: 100vh;
    }
    .login-image {
      flex:1;
      background-image: url("{{ asset('template/img/social/almacen.webp') }}");
      background-size: cover;
      background-position: center;
    }
    .login-form {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
  {{-- @laravelPWA --}}
</head>
<body>
  <div class="login-container">
    <div class="login-image d-none d-md-block"></div>
    <div class="login-form">
      <div class="">
        <div class="text-center mb-3">
          <img src="{{ asset('logo.png') }}" width="200px">
        </div>
        <h3 class="text-center mb-4">Inicia sesión con tu cuenta</h3>

        <form class="form-sample form-submit" action="{{ route('login') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" value="" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>


          <div class="d-grid">
            <button class="btn btn-primary btn-lg" type="submit"><strong>Iniciar sesión</strong></button>
          </div>
          <div class="mt-3 text-center">

            <a href="{{ route('root.registrar') }}">Registrar usuario</a>
          </div>
          {{-- <div class="d-grid mt-3">
            <a class="btn btn-outline-light text-dark border btn-lg" href="{{ route('auth.google') }}">
              <svg class="w-6 h-6 text-danger ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12.037 21.998a10.313 10.313 0 0 1-7.168-3.049 9.888 9.888 0 0 1-2.868-7.118 9.947 9.947 0 0 1 3.064-6.949A10.37 10.37 0 0 1 12.212 2h.176a9.935 9.935 0 0 1 6.614 2.564L16.457 6.88a6.187 6.187 0 0 0-4.131-1.566 6.9 6.9 0 0 0-4.794 1.913 6.618 6.618 0 0 0-2.045 4.657 6.608 6.608 0 0 0 1.882 4.723 6.891 6.891 0 0 0 4.725 2.07h.143c1.41.072 2.8-.354 3.917-1.2a5.77 5.77 0 0 0 2.172-3.41l.043-.117H12.22v-3.41h9.678c.075.617.109 1.238.1 1.859-.099 5.741-4.017 9.6-9.746 9.6l-.215-.002Z" clip-rule="evenodd"/>
              </svg>
              <strong>Iniciar con Google</strong>
            </a>
          </div> --}}
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.6/dist/js/coreui.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('components._alert')
  <script>
    // swalMessage("success",'error');
  </script>
</body>
</html>
