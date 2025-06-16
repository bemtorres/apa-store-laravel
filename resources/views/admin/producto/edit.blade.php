
@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('admin.producto.index'))
    @slot('color', 'dark')
    @slot('body', 'Editar de producto ' . $p->nombre)
  @endcomponent
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.producto.update',$p->idi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="codigo">Codigo<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control {{ $errors->has('codigo') ? 'is-invalid' : '' }}" name="codigo" id="codigo" value="{{ $p->codigo}}" required/>
                    {!! $errors->first('codigo', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                  </div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Nombre<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" value="{{ $p->nombre  }}" required/>
                    {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                  </div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="descripcion">Descripcion<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" name="descripcion" id="descripcion" value="{{ $p->descripcion }}" required/>
                    {!! $errors->first('descripcion', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                  </div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="precio">Precio<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control {{ $errors->has('precio') ? 'is-invalid' : '' }}" name="precio" id="precio" value="{{ $p->precio }}" required/>
                    {!! $errors->first('precio', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label" for="image">Imagen<label>
              </div>
              <div class="d-flex justify-content-center">
                <div class="card mb-3">
                  <img src="{{  asset($p->present()->getPhoto()) }}" class="img" width="200"  alt="">
                </div>
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
