
@extends('layouts.app')
@push('css')
  {{-- <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}"> --}}
@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @component('components.button._back')
      @slot('route', route('usuarios.show', $u->id))
      @slot('color', 'secondary')
      @slot('body', 'Editar ' . $u->nombre_completo())
    @endcomponent
    <div class="col-md-7">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('usuarios.update',$u->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12 mb-3">
              <div class="d-flex align-items-center">
                <div class="avatar avatar-md">
                  <img class="avatar-img" src="{{ asset($u->getPhoto()) }}" alt="">
                </div>
                <div class="ms-2">
                  <span class="h6 mt-2 mt-sm-0">{{ $u->nombre_completo() }}</span>
                  <p class="small m-0">{{ $u->correo }}</p>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="correo">Correo <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="email" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="correo" value="{{ $u->correo }}"/>
                    {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                  </div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Nombre <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $u->nombre }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="apellido_p">Primer Apellido<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="apellido_p" id="apellido_p" value="{{ $u->primer_apellido }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="apellido_m">Segundo Apellido <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="apellido_m" id="apellido_m" value="{{ $u->segundo_apellido }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card mb-3 text-center">
                  <img src="{{ asset($u->sede->getImg()) }}" class="img text-center" width="200"  alt="">
                </div>
              </div>

              <div class="col-md-8 mb-3">
                <label for="sede">Sede<small class="text-danger">*</small></label>
                <select class="form-control" id="sede" name="sede">
                  @foreach ($sedes as $s)
                    <option value="{{ $s->id }}" {{ $s->id == $u->id_sede ? 'selected' : '' }}>{{ $s->nombre }}</option>
                  @endforeach
                </select>
              </div>

              @if (current_user()->super_admin)
              <div class="col-md-6 mb-3">
                <label for="rol">Tipo usuario<small class="text-danger">*</small></label>
                <select class="form-control" id="rol" name="rol">
                  @foreach ($tipos_user as $t)
                    <option value="{{ $t }}" {{ $u->tipo_general == $t ? 'selected' : '' }}> {{ Str::upper($t) }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label for="super">Super admin<small class="text-danger">*</small></label>
                <select class="form-control" id="super" name="super">
                  <option value="1" {{ $u->super_admin ? 'selected' : '' }}>Si</option>
                  <option value="2" {{ !$u->super_admin ? 'selected' : '' }}>No</option>
                </select>
              </div>


              @else
              <input type="hidden" name="rol" value="{{ current_user()->tipo_general }}">
              @endif


              <div class="col-md-6 mb-3">
                <label for="admin">Administrador<small class="text-danger">*</small></label>
                <select class="form-control" id="admin" name="admin">
                  <option value="1" {{ $u->tipo_usuario == 1 ? 'selected' : '' }}>Si</option>
                  <option value="2" {{ $u->tipo_usuario == 2 ? 'selected' : '' }}>No</option>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label for="admin">User only tablet<small class="text-danger">*</small></label>
                <select class="form-control" id="user_app" name="user_app">
                  <option value="si" {{ $u->user_app ? 'selected' : '' }}>Si</option>
                  <option value="no" {{ $u->user_app ? '' : 'selected' }}>No</option>
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
    <div class="col-md-5">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('usuarios.update',$u->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="pass">Cambiar contraseña <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="password" class="form-control" name="pass" id="pass" value="" required/>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <form action="{{ route('usuarios.update.img',$u->id) }}" class="form-submit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="d-flex justify-content-center">
              <div class="card mb-3">
                <img src="{{ asset($u->getPhoto()) }}" class="img" width="200"  alt="">
              </div>
            </div>
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
{{-- <script src="{{ asset('vendors/select2/select2.min.js') }}"></script> --}}
{{-- <script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/select2.js') }}"></script> --}}
<script src="{{ asset('template/js/preview.js') }}"></script>

@endpush
