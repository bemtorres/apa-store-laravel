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

        <form class="form-sample form-submit" action="{{ route('root.recuperar.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" value="" required>
          </div>

          <div class="d-grid">
            <button class="btn btn-primary btn-lg" type="submit"><strong>Recuperar</strong></button>
          </div>
          <div class="d-grid mt-3">
            <a class="btn btn-danger btn-lg" href="{{ route('tienda.index')  }}">
              <strong>Tiendas disponibles</strong>
            </a>

            <a class="btn btn-danger btn-lg" href="{{ route('root')  }}">
              <strong>Volver</strong>
            </a>
          </div>
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
