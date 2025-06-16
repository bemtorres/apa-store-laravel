
@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('admin.config.zona.index'))
    @slot('color', 'dark')
    @slot('body', 'Nueva zona')
  @endcomponent
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.config.zona.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Nombre<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required/>
                  </div>
                </div>
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
