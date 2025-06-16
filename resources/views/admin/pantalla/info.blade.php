
@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('admin.pantalla.show', $p->id))
    @slot('color', 'dark')
    @slot('body', 'Editar Info ' . $p->nombre)
  @endcomponent

  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-header">
          Editar contenido de fondo
        </div>
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.pantalla.info', $p->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="block" value="1" hidden>
            <div class="row mb-3">
              <div class="mb-3">
                <label for="uploadedFile" class="form-label">Seleccione un archivo:</label>
                <input type="file" class="form-control" name="uploadedFile" id="uploadedFile" accept="application/pdf, image/*" required>
              </div>
            </div>
            <div class="form-group d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>

    </div>

    {{-- <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-header">
          Enviar mensaje de alerta
        </div>
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.pantalla.info', $p->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="block" value="2" hidden>
            <div class="row mb-3">
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Titulo<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required/>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Tiempo<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" name="time" id="time" value="{{ old('time') }}" required/>
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="uploadedFile" class="form-label">Seleccione un archivo:</label>
                <input type="file" class="form-control" name="uploadedFile" id="uploadedFile" accept="application/pdf, image/*" required>
              </div>
            </div>
            <div class="form-group d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div> --}}

  </div>
</div>

@endsection
@push('js')

@endpush
