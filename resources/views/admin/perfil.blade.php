
@extends('layouts.app')
@push('css')
  {{-- <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}"> --}}
@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @component('components.button._back')
      @slot('body', 'Mi perfil')
    @endcomponent
    <div class="col-md-7">
      <div class="card shadow mb-3">
        <div class="card-body">
          {{-- <form class="form-sample form-submit" action="{{ route('admin.perfil') }}" method="POST"> --}}
            @csrf
            {{-- @method('PUT') --}}
            <div class="row mb-3">
              <div class="col-md-12 mb-3">
                <div class="d-flex align-items-center justify-content-center ">
                  <div class="avatar avatar-xl">
                    <img class="avatar-img" src="{{ asset(current_user()->getPhoto()) }}" alt="">
                  </div>
                  <div class="ms-2">
                    <p class="h6 mt-2 mt-sm-0">{{ current_user()->nombre_completo() }}</p>
                    <p class="small m-0">{{ current_user()->correo }}</p>
                    <p class="badge badge-pill bg-dark">{{ current_user()->sede->nombre }}</p>
                  </div>
                </div>
              </div>
              {{-- <div class="form-group row">
                <label class="col-sm-12" for="correo">Correo <small class="text-danger">*</small></label>
                <div class="col-sm-12">
                  <input type="email" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" readonly  value="{{ $u->correo }}"/>
                </div>
              </div> --}}

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Nombre <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" readonly name="nombre" id="nombre" value="{{ $u->nombre }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="apellido_p">Primer Apellido<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" readonly name="apellido_p" id="apellido_p" value="{{ $u->primer_apellido }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="apellido_m">Segundo Apellido<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" readonly name="apellido_m" id="apellido_m" value="{{ $u->segundo_apellido }}" required/>
                  </div>
                </div>
              </div>

              <!-- Agregado por error en ID_SEDE, corresponde a una relacion por defecto que se debe realizar al crear el modelo Usuario -->
              <div class="col-md-12 mb-3">
                <label for="sede">Sede<small class="text-danger">*</small></label>
                <select class="form-control" id="sede" name="sede" readonly>
                  @foreach ($sedes as $s)
                    <option value="{{ $s->id }}" {{ $s->id == $u->id_sede ? 'selected' : '' }}>{{ $s->nombre }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            {{-- <div class="form-group d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div> --}}
          {{-- </form> --}}
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.perfil.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="style">Cambiar estilo<small class="text-danger">*</small></label>
                <select class="form-control" id="style" name="style">
                  @foreach ($styles as $key => $style)
                    <option value="{{ $key }}" {{ current_user()->getInfoStyleKey() == $key ? 'selected' : '' }}>{{ $style }}</option>
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

      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.perfil.update') }}" method="POST">
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




      <div class="col mb-4">
        <div class="card mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table
              table-sm
              table-hover
              align-middle">
                <thead>
                  <tr>
                    <th>Sede</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    @foreach ($u->detalleSede as $d)
                      @php
                        $s = $d->sede;
                      @endphp
                    <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="">
                              <img src="{{ asset($s->getImg()) }}" width="50" alt="">
                            </div>
                            <div class="ms-2">
                              <span class="h6 mt-2 mt-sm-0">{{ $s->nombre }}</span>
                              @if ($d->activo)
                                <i class="ms-2 fa fa-circle-check text-success"></i>
                              @else
                                <i class="ms-2 fa fa-times text-danger"></i>
                              @endif
                            </div>
                          </div>
                        </td>
                        <td>
                          {{ $d->getCargo() }}
                        </td>
                        <td>
                            {{-- @csrf
                            @method('PUT')
                            <input type="hidden" name="sede_id" value="{{ $s->id }}">

                            <select class="form-select form-select-sm" name="activar" id="activar">
                              <option value="si" {{ $s->checked ? 'selected' : '' }}>Activar</option>
                              <option value="no" {{ !$s->checked ? 'selected' : '' }}>Desactivar</option>
                            </select> --}}

                            {{-- @if ($s->checked)
                              <select class="form-select form-select-sm" name="cargo" id="cargo">
                                @foreach ($cargos as $key => $c)
                                  <option value="{{ $key }}" {{ $s->cargo == $key ? 'selected' : '' }}>{{ $c }}</option>
                                @endforeach
                              </select>
                            @endif --}}

                            {{-- @if ($s->checked)
                              <button type="submit" name="btn_active" class="btn btn-success text-white btn-sm">Guardar</button>
                            @else
                              <button type="submit" name="btn_active" class="btn btn-dark text-white btn-sm">Guardar</button>
                            @endif --}}
                            {{-- <button type="submit" name="btn_active" class="btn btn-danger text-white btn-sm">Activar</button> --}}
                          </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
          </div>
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

<!-- Aquí estará el script para manejar el cambio dinámico de estilo -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Asignamos el archivo CSS inicial (por defecto, basic.css)
    let currentStyle = 'basic';

    // Función para actualizar el estilo del CSS
    function changeStyle(newStyle) {
      // Eliminar el enlace actual de CSS
      const oldLink = document.getElementById('style-css');
      if (oldLink) {
        oldLink.remove();
      }

      // Crear un nuevo elemento link
      const link = document.createElement('link');
      link.id = 'style-css';  // Aseguramos que tenga un ID para poder eliminarlo luego
      link.rel = 'stylesheet';
      link.type = 'text/css';
      link.href = '{{ asset('template/css/styles/') }}/' + newStyle + '.css';  // Construimos la URL dinámica

      // Insertamos el nuevo link en el <head>
      document.head.appendChild(link);
    }

    // Detectamos el cambio en el select y actualizamos el estilo
    document.getElementById('style').addEventListener('change', function() {
      const selectedStyle = this.value;  // Obtenemos la nueva selección
      changeStyle(selectedStyle);
    });

    // Iniciar con el estilo 'basic' por defecto
    changeStyle(currentStyle);
  });
</script>

@endpush
