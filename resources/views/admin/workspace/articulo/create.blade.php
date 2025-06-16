
@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('admin.workspace.show',$ws->id))
    @slot('color', 'dark')
    @slot('body', 'Nuevo producto')
  @endcomponent
  <div class="row">
    @include('admin.workspace.articulo._tabs')
    <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.workspace.articulos.store', $ws->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="codigo">Codigo<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="codigo" id="codigo" value="{{ old('codigo') }}" required/>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12" for="nombre">Nombre<small class="text-danger">*</small></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required/>
                </div>
              </div>

              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
              </div>

              <div class="form-group row">
                <label class="col-sm-12" for="stock">Stock<small class="text-danger">*</small></label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" name="stock" id="stock" value="{{ old('stock') }}" required/>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12" for="stock_critico">Stock Critico<small class="text-danger">*</small></label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" name="stock_critico" id="stock_critico" value="{{ old('stock_critico') }}" required/>
                </div>
              </div>

              {{-- <div class="col-md-4 mb-3">
                <label for="admin">Administrador<small class="text-danger">*</small></label>
                <select class="form-control" id="admin" name="admin">
                  <option value="1">Administrador</option>
                  <option value="2">Estudiante</option>
                </select>
              </div>

              <div class="col-md-4 mb-3">
                <label for="admin">Administrador<small class="text-danger">*</small></label>
                <select class="form-control" id="admin" name="admin">
                  <option value="1">Si</option>
                  <option value="2" selected>No</option>
                </select>
              </div> --}}

              {{-- <div class="col-md-4 mb-3">
                <label for="admin">User only tablet<small class="text-danger">*</small></label>
                <select class="form-control" id="user_app" name="user_app">
                  <option value="si">Si</option>
                  <option value="no" selected>No</option>
                </select>
              </div> --}}

              {{-- <div class="col-md-4">
                <label for="teams">Team</label>
                <select class="form-control" id="teams" name="team">
                  <option value="">-- selecione un team --</option>
                  @foreach ($teams as $t)
                    <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                  @endforeach
                </select>
              </div> --}}
{{--
              <div class="col-md-4 mb-3">
                <label for="tipo">Tipo usuario</label>
                <select class="form-control" id="tipo" name="tipo">
                  <option value="1">Alternativa 1</option>
                  <option value="2">Alternativa 2</option>
                  <option value="3">Alternativa 3</option>
                </select>
              </div> --}}

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
