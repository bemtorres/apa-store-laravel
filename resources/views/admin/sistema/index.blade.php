@extends('layouts.app')
@push('css')
<style>
  .loading {
      font-size: 14px;
      display: flex;
      align-items: center;
  }
  .loading span {
      margin-left: 5px;
  }
</style>
@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    {{-- @slot('route', route('admin.pantalla.show', $ws->id)) --}}
    {{-- @slot('color', 'dark') --}}
    @slot('body', 'Sistema')
  @endcomponent

  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="block" value="sistema">
            <div class="row mb-3">

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Nombre<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $s->nombre }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="sede">Zona principal<small class="text-danger">*</small></label>
                <select class="form-control" id="sede" name="sede">
                  @foreach ($sedes as $se)
                    <option value="{{ $se->id }}" {{ $se->id == $s->id_sede ? 'selected' : '' }}>{{ $se->nombre }}</option>
                  @endforeach
                </select>
              </div>

              <hr>
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="title">Titulo de la página<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="title" id="title" value="" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="mb-3">
                  <label class="form-label" for="image">Imagen<label>
                </div>
                <div class="mb-3">
                  <input type="file" class="form-control" name="image" accept="image/*" onchange="preview(this)" />
                </div>


                <div class="d-flex justify-content-center">
                  <div id="preview"></div>
                </div>

                <div class="text-center">
                  <img src="{{ asset($s->present()->getLogo()) }}" style="width: 400px" class="img-responsive img-fluid" alt="">
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="mb-3">
                  <label class="form-label" for="image2">Icono<label>
                </div>
                <div class="mb-3">
                  <input type="file" class="form-control" name="image2" accept="image/*" onchange="preview2(this)" />
                </div>


                <div class="d-flex justify-content-center">
                  <div id="preview2"></div>
                </div>

                <div class="text-center">
                  <img src="{{ asset($s->present()->getIcon()) }}" style="width: 400px" class="img-responsive img-fluid" alt="">
                </div>
              </div>
            </div>
            <div class="form-group d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>

    </div>
    {{-- @if (current_user()->super_admin)
    <div class="col-md-3">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">

              <div class="col-md-12 mb-3">
                <label for="sede">Habilitar espacios<small class="text-danger">*</small></label>
                <select class="form-control" id="sede" name="sede">
                    <option value="si" {{ $se->id == $s->id_sede ? 'selected' : '' }}>Activar</option>
                    <option value="no" {{ false ? 'selected' : '' }}>Desactivar</option>
                </select>
              </div>

              <div class="col-md-12 mb-3">
                <label for="sede">Habilitar pantallas<small class="text-danger">*</small></label>
                <select class="form-control" id="sede" name="sede">
                    <option value="si" {{ true ? 'selected' : '' }}>Activar</option>
                    <option value="no" {{ false ? 'selected' : '' }}>Desactivar</option>
                </select>
              </div>

              <div class="col-md-12 mb-3">
                <label for="sede">Habilitar ASE<small class="text-danger">*</small></label>
                <select class="form-control" id="sede" name="sede">
                    <option value="si" {{ true ? 'selected' : '' }}>Activar</option>
                    <option value="no" {{ false ? 'selected' : '' }}>Desactivar</option>
                </select>
              </div>

            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endif --}}

    <div class="col-md-3">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <input type="hidden" name="block" value="demo">
              <div class="col-md-12 mb-3">
                <label for="sede">Demo mail<small class="text-danger">*</small></label>
                <select class="form-control" id="demo" name="demo">
                    <option value="si" {{ $s->getConfigMailDemoActive() ? 'selected' : '' }}>Activar</option>
                    <option value="no" {{ !$s->getConfigMailDemoActive() ? 'selected' : '' }}>Desactivar</option>
                </select>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="email">Email Test</label>
                  <div class="col-sm-12">
                    <input type="email" class="form-control" name="email" id="email" value="{{ $s->getConfigMailDemoUser() }}" required/>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>



      <div class="card mb-3">
        <div class="card-header">
            <h5>Enviar Correo</h5>
        </div>
        <div class="card-body">
          <form id="emailForm">
            <div class="mb-3">
              <label for="correo" class="form-label">Correo Electrónico</label>
              <input type="email" class="form-control" id="correo" placeholder="Ingresa tu correo">
            </div>
            <div class="mb-3">
              <label for="asunto" class="form-label">Asunto</label>
              <input type="text" class="form-control" id="asunto" placeholder="Ingresa el asunto">
            </div>
            <div class="mb-3">
              <label for="mensaje" class="form-label">Mensaje</label>
              <textarea class="form-control" id="mensaje" rows="3" placeholder="Ingresa tu mensaje"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="sendButton">
              Enviar Correo
            </button>
            <span id="loadingMessage" class="loading" style="display: none;">
              <span>Enviando mensaje</span>
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            </span>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-submit"  method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="block" value="postulante">

            <div class="mb-3">
              <label for="mensaje" class="form-label">Acceso a estudiantes</label>
            </div>
            <div class="mb-3">
              <label for="postulante">Entrega de documentos<small class="text-danger">*</small></label>
              <select class="form-control" id="postulante" name="postulante">
                <option value="1" {{ $s->getLoginPostulante() ? 'selected' : '' }}>Activado</option>
                <option value="2" {{ !$s->getLoginPostulante() ? 'selected' : '' }}>Desactivado</option>
              </select>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
@push('js')
<script src="{{ asset('template/js/preview.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('emailForm').addEventListener('submit', function (e) {
      e.preventDefault();

      // Mostrar mensaje de "Enviando"
      document.getElementById('sendButton').disabled = true;
      document.getElementById('loadingMessage').style.display = 'inline-block';

      // Recoger los datos del formulario
      const correo = document.getElementById('correo').value;
      const asunto = document.getElementById('asunto').value;
      const mensaje = document.getElementById('mensaje').value;
      // const provider = document.getElementById('provider').value;

      // Datos a enviar en el cuerpo de la solicitud
      const data = {
          provider: 'ase',
          correo: correo,
          asunto: asunto,
          titulo: "¡Tienes un nuevo mensaje!",
          presentacion: "",
          mensaje: mensaje
      };

      // Enviar solicitud a la API
      fetch('https://www.fidelizacionsb.cl/api/v2/services/mail?token=emailglobal2024', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
      })
      .then(response => response.json())
      .then(data => {
          if (data.message === 'Correo enviado correctamente') {
              alert('Correo enviado correctamente');
          } else {
              alert('Error: ' + data.message);
          }
          document.getElementById('sendButton').disabled = false;
          document.getElementById('loadingMessage').style.display = 'none';
          // Limpiar el formulario
          document.getElementById('emailForm').reset();
      })
      .catch(error => {
          // Manejar errores de la API
          alert('Error al enviar el correo: ' + error.message);
          document.getElementById('sendButton').disabled = false;
          document.getElementById('loadingMessage').style.display = 'none';
      });
  });
});
</script>
@endpush
