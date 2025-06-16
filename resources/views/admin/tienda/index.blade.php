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
    @slot('body', 'Tienda')
  @endcomponent

  <div class="row">
    <div class="col-md-5">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="block" value="sistema">
            <div class="row mb-3">

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">DOMINIO</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" value="{{ $t->dominio }}" readonly disabled/>
                  </div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Nombre<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $t->nombre }}" required/>
                  </div>
                </div>
              </div>

              <hr>

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="color_fondo">Color fondo<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="color" class="form-control" name="color_fondo" id="color_fondo" value="{{ $t->getColorFondo() }}" required/>
                  </div>
                </div>
              </div>
{{--
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="color_texto">Color texto<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="color" class="form-control" name="color_texto" id="color_texto" value="{{ $t->getColorTexto() }}" required/>
                  </div>
                </div>
              </div> --}}

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

                {{-- {{ asset($t->present()->getLogo()) }} --}}
                <div class="text-center">
                  <img src="{{ asset($t->present()->getLogo()) }}" style="width: 400px" class="img-responsive img-fluid" alt="">
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="mb-3">
                  <label class="form-label" for="icon">Icono<label>
                </div>
                <div class="mb-3">
                  <input type="file" class="form-control" name="icon" accept="image/*" onchange="preview2(this)" />
                </div>


                <div class="d-flex justify-content-center">
                  <div id="preview2"></div>
                </div>

                <div class="text-center">
                  <img src="{{ asset($t->present()->getIcon()) }}" style="width: 400px" class="img-responsive img-fluid" alt="">
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

    <div class="col-md-7">
      <div class="card text-left">
        <div class="card-body">
          <h4 class="card-title">Dominios de entrega de API</h4>
          <div
            class="table-responsive"
          >
            <table
              class="table table-hover"
            >
              <thead>
                <tr>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">URL</th>
                </tr>
              </thead>
              <tbody>
                <tr class="">
                  <td scope="row">TODOS PRODUCTOS</td>
                  <td class="text-primary">{{ route('api.services.productos.index', $t->dominio) }}</td>
                </tr>
                <tr class="">
                  <td scope="row">INFO PRODUCTO</td>
                  <td class="text-primary">{{ route('api.services.productos.show', [$t->dominio, 'CODIGO']) }}</td>
                </tr>
              </tbody>
            </table>
          </div>

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
                    <option value="si" {{ $te->id == $t->id_sede ? 'selected' : '' }}>Activar</option>
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

  </div>
</div>
@endsection
@push('js')
<script src="{{ asset('template/js/preview.js') }}"></script>
@endpush
