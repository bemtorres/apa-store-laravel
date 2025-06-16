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
    /* Estilos generales */
    body {
      background: #372104;
      font-family: 'Lato', 'Merriweather', sans-serif;
      margin: 0;
      padding: 0;
      height: 100vh;
    }

    /* Contenedor de login */
    .login-container {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
      justify-content: center;
    }

    /* Imagen de login */
    .login-image {
      flex: 1;
      background-image: url("{{ asset('template/img/social/almacen.webp') }}");
      background-size: cover;
      background-position: center;
      display: none;
    }

    /* Formulario de login */
    .login-form {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 10px;
      background-color: #372104; /* Fondo verde suave */
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin: 0 15px;
    }

    /* Ajustes para pantallas grandes */
    @media(min-width: 768px) {
      .login-image {
        display: block;
      }
    }

    /* Contenedor del formulario */
    .form-container {
      width: 100%;
      max-width: 700px; /* Aumenta el tamaño máximo para que el formulario no sea tan estrecho */
      background-color: #f7f1de;
      padding: 30px;
      border-radius: 8px;
      display: flex;
      flex-direction: column;
    }

    /* Título */
    .login-form h3 {
      color: #372104;
      margin-bottom: 10px;
      font-size: 24px;
      text-align: center;
    }

    .form-label {
      color: #372104;
    }

    /* Estilos para los inputs */
    .form-control {
      border: 2px solid #372104;
      border-radius: 5px;
      margin-bottom: 15px;
      padding: 10px;
    }

    .form-control:focus {
      border-color: #ffcb77;
      box-shadow: 0 0 0 0.2rem rgba(255, 199, 119, 0.25);
    }

    /* Botón de registro */
    .btn-primary {
      background-color: #6f9e2d; /* Verde */
      border-color: #6f9e2d;
      color: white;
      padding: 12px;
      font-size: 16px;
      border-radius: 5px;
      width: 100%;
    }

    .btn-primary:hover {
      background-color: #5a8e2a;
      border-color: #5a8e2a;
    }

    /* Ajustes para icono y logo */
    .login-form .text-center img {
      width: 150px;
      margin-bottom: 10px;
    }

    /* Estilos de las columnas */
    .row {
      display: flex;
      flex-wrap: wrap;
    }

    .col-6 {
      width: 50%; /* 6 columnas en la grilla */
      padding-right: 15px;
      padding-left: 15px;
    }

    @media(max-width: 767px) {
      .col-6 {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-form">
      <div class="form-container">
        <h3 class="text-center mb-0">REGISTRO USUARIO</h3>
        <div class="text-center">
          <img src="{{ asset('logo.png') }}" alt="Logo">
        </div>
        <form class="form-sample form-submit" action="{{ route('root.registrar.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-6">
              <div class="mb-3">
                <label for="clave" class="form-label">Clave</label>
                <input type="text" class="form-control" id="clave" name="clave" value="" required>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="tienda" class="form-label">Nombre Tienda</label>
                <input type="text" class="form-control" id="tienda" name="tienda" value="" required>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="" required>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="" required>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" value="" required>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
            </div>
          </div>
          <div class="d-grid">
            <button class="btn btn-primary btn-lg mb-2" type="submit"><strong>Registrar</strong></button>
            <a class="mt-4" href="{{ route('root') }}"><strong>VOLVER</strong></a>
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
