@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @component('components.button._back')
      @slot('route', route('admin.pantalla.index'))
      @slot('color', 'secondary')
      @slot('body', 'Espacio - ' . $s->nombre)
    @endcomponent
    <div class="col-md-2">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12 mb-4">
              <div class="py-md-1 align-items-center justify-content-center">
                <div class="list-group">
                  <a href="{{ route('admin.pantalla.info', $s->id) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    {{-- <i class="bi bi-window-fullscreen rounded-circle fa-2x flex-shrink-0"></i> --}}
                    <div class="d-flex gap-2 w-100 justify-content-between">
                      <p class="mb-0">Contenido</p>
                    </div>
                  </a>
                  <a href="{{ route('admin.pantalla.edit', $s->id) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    {{-- <i class="bi bi-pencil-square rounded-circle fa-2x flex-shrink-0"></i> --}}
                    <div class="d-flex gap-2 w-100 justify-content-between">
                      <div>
                        <p class="mb-0">Editar</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-10">
      <div class="d-flex justify-content-between mb-1">
        <small><span class="badge bg-dark">Preview</span></small>
        <a href="{{ route('www.show',$s->subdomain) }}" target="_blink" class="badge bg-success btn text-white">URL</a>
      </div>
      <div class="border border-2 border-primary rounded">
        {{-- iframe de sitio web --}}
        <iframe class="embed-responsive-item" width="100%" height="600px" src="{{ route('www.show', $s->subdomain) }}" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
@endsection
