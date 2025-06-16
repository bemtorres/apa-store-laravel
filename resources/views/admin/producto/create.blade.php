
@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('usuarios.index'))
    @slot('color', 'dark')
    @slot('body', 'Creación de usuarios')
  @endcomponent
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="run">Rut<small>(Opcional)</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="run" id="run" value="{{ old('run') }}" />
                  </div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="correo">Correo<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="email" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="correo" value="{{ old('correo') }}" required/>
                    {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                  </div>
                </div>
              </div>

              {{-- <div class="col-md-4">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label class="col-sm-12" for="usuario">Usuario <small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="usuario" id="usuario" required/>
                  </div>
                </div>
              </div> --}}

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="pass">Contraseña<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="password" class="form-control" name="pass" id="pass" value="" required/>
                  </div>
                </div>
              </div>

              {{-- <div class="col-md-4 mb-3">
              </div> --}}


              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Nombre<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="apellido_p">Primer Apellido<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="apellido_p" id="apellido_p" value="{{ old('apellido_p') }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="apellido_m">Segundo Apellido<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="apellido_m" id="apellido_m" value="{{ old('apellido_m') }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="cargo">Cargo<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="cargo" id="cargo" value="{{ old('cargo') }}" required/>
                  </div>
                </div>
              </div>

              <!-- Agregado por error en ID_SEDE, corresponde a una relacion por defecto que se debe realizar al crear el modelo Usuario -->
              <div class="col-md-6 mb-3">
                <label for="sede">Sede<small class="text-danger">*</small></label>
                <select class="form-control" id="sede" name="sede">
                  @foreach ($sedes as $s)
                    <option value="{{ $s->id }}">{{ $s->nombre }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label for="admin">Administrador<small class="text-danger">*</small></label>
                <select class="form-control" id="admin" name="admin">
                  <option value="1">Sí</option>
                  <option value="2" selected>No</option>
                </select>
              </div>

              {{--  --}}
              @if (current_user()->super_admin)
              <div class="col-md-6 mb-3">
                <label for="rol">Tipo usuario<small class="text-danger">*</small></label>
                <select class="form-control" id="rol" name="rol">
                  @foreach ($tipos_user as $t)
                    <option value="{{ $t }}"> {{ Str::upper($t) }}</option>
                  @endforeach
                  {{-- <option value="ase">ASE</option> --}}
                  {{-- <option value="pantalla">PANTALLA</option> --}}
                </select>
              </div>
              @endif

              <div class="col-md-4 mb-3" hidden>
                <label for="admin">User only tablet<small class="text-danger">*</small></label>
                <select class="form-control" id="user_app" name="user_app">
                  <option value="si">Si</option>
                  <option value="no" selected>No</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="image">Imagen<label>
              </div>
              <div class="mb-3">
                <input type="file" class="form-control" name="image" accept="image/*" onchange="preview(this)" />
              </div>

              <div class="d-flex justify-content-center">
                <div id="preview"></div>
              </div>

            </div>
            <div class="form-group d-flex justify-content-end">
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

@endpush
