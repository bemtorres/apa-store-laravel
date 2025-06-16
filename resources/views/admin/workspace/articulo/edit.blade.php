@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('admin.workspace.articulos', $ws->id))
    @slot('color', 'dark')
    @slot('body', 'Creación de espacio de trabajo')
  @endcomponent
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.workspace.articulos.update', [$ws->id, $a->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="codigo">Codigo<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="codigo" id="codigo" value="{{ $a->codigo }}" required/>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12" for="nombre">Nombre<small class="text-danger">*</small></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $a->nombre }}" required/>
                </div>
              </div>

              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{ $a->descripcion }}</textarea>
              </div>

              <div class="form-group row">
                <label class="col-sm-12" for="stock">Stock<small class="text-danger">*</small></label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" name="stock" id="stock" value="{{ $a->stock }}" required/>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-12" for="stock_critico">Stock Critico<small class="text-danger">*</small></label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" name="stock_critico" id="stock_critico" value="{{ $a->stock_critico }}" required/>
                </div>
              </div>

              <div class="text-center">
                <img src="{{ asset($a->getPhoto()) }}" alt="" style="width: 200px;" class="rounded">
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
