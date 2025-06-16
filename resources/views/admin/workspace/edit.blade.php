
@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('admin.workspace.show', $ws->id))
    @slot('color', 'dark')
    @slot('body', 'Editar ' . $ws->nombre)
    @slot('historial', [
      [route('admin.workspace.index'), 'Espacios'],
      [route('admin.workspace.show', $ws->id), $ws->nombre],
      ['','Editar']
    ])
  @endcomponent

  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.workspace.update', $ws->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Nombre<small class="text-danger">*</small>

                    {{-- <div><small>Se creara el siguiente espacio:  <strong> <span id="contentSubdomain">{{ $ws->id }}</span></strong></small></div> --}}
                  </label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $ws->nombre }}"  onkeyup="generarSubdominio()" required/>
                  </div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="subdomain">Sudominio<small class="text-danger">*</small> <span class="text-success">(modificar si quieres cambiar la ruta)</span></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="subdomain" id="subdomain" value="{{ $ws->subdomain }}" required/>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{ $ws->descripcion }}</textarea>
              </div>

              <!-- Agregado por error en ID_SEDE, corresponde a una relacion por defecto que se debe realizar al crear el modelo Usuario -->
              <div class="col-md-12 mb-3">
                <label for="sede">Sede<small class="text-danger">*</small></label>
                <select class="form-control" id="sede" name="sede">
                  @foreach ($sedes as $s)
                    <option value="{{ $s->id }}" {{ $s->id == $ws->id_sede ? 'selected' : '' }}>{{ $s->nombre }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>

    </div>
    <div class="col-md-6">
      <div class="container">
        <div class="d-flex justify-content-center">
          <div class="card mb-3">
            <img src="{{ asset($ws->getPhoto()) }}" width="200px" alt="">
          </div>
        </div>
        <div class="row">


          <div class="col-md-12 mb-3">
            <div class="card border-dark">
              <div class="card-body">
                <div class="text-center mb-3">
                  <h5>IMAGEN</h5>
                </div>
                <div class="text-center">
                  <img src="{{ asset($ws->getPhoto()) }}" style="width: 400px" class="img-responsive img-fluid" alt="">
                </div>
              </div>
            </div>
          </div>


          <form action="{{ route('workspace.update.img',$ws->id) }}" class="form-submit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card border-dark">
              <div class="card-body">

                <div class="mb-3">
                  <label class="form-label" for="image">Imagen<label>
                </div>
                <div class="mb-3">
                  <input type="file" class="form-control" name="image" accept="image/*" onchange="preview(this)" />
                </div>


                <div class="d-flex justify-content-center">
                  <div id="preview"></div>
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </div>
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
  function generarSubdominio() {
            let inputNombre = document.getElementById('nombre').value;
            // Convertir a minúsculas
            let subdominio = inputNombre.toLowerCase()
                // Reemplazar acentos y caracteres especiales
                .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                // Reemplazar espacios por guiones
                .replace(/\s+/g, '-')
                // Eliminar caracteres no permitidos
                .replace(/[^a-z0-9-]/g, '');

            // Mostrar el subdominio generado
            // document.getElementById('subdomain').value = `${subdominio}`;
            // document.getElementById('contentSubdomain').innerHTML = `${subdominio}`;
        }

</script>
@endpush
