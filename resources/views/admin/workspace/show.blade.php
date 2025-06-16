@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @component('components.button._back')
      @slot('route', route('admin.workspace.index'))
      @slot('color', 'secondary')
      @slot('body',  Str::upper($ws->nombre))
      @slot('historial', [
        [route('admin.workspace.index'), 'Espacios'],
        [route('admin.workspace.show', $ws->id), $ws->nombre]
      ])

    @endcomponent

    <div class="col-md-12">
      {{-- @include('admin.workspace._tabs_workspace') --}}
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="row">

            <div class="col-lg-4 mb-4">

              <div class="py-md-1 align-items-center justify-content-center">
                <div class="list-group">
                  <a href="{{ route('admin.workspace.articulos', $ws->id) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <i class="bi bi-box-fill rounded-circle fa-2x flex-shrink-0"></i>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                      <div>
                        <h6 class="mb-0">Articulos</h6>
                        <p class="mb-0 opacity-75">Listados de todos los articulos de <strong>{{ $ws->nombre }}</strong>.</p>
                      </div>
                      {{-- <small class="opacity-50 text-nowrap">now</small> --}}
                    </div>
                  </a>
                  {{-- <a href="{{ route('admin.workspace.categorias', $ws->id) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <i class="bi bi-list-task rounded-circle fa-2x flex-shrink-0"></i>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                      <div>
                        <h6 class="mb-0">Categorías</h6>
                        <p class="mb-0 opacity-75">Lo Articulos pueden tener categorias.</p>
                      </div>
                    </div>
                  </a> --}}
                  {{-- <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                      <div>
                        <h6 class="mb-0">Third heading</h6>
                        <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                      </div>
                      <small class="opacity-50 text-nowrap">1w</small>
                    </div>
                  </a> --}}
                </div>
              </div>

            </div>



            <div class="col-lg-4 mb-4">

              <div class="py-md-1 align-items-center justify-content-center">
                <div class="list-group">
                  <a href="{{ route('admin.workspace.usuarios', $ws->id) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <i class="bi bi-people-fill rounded-circle fa-2x flex-shrink-0"></i>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                      <div>
                        <h6 class="mb-0">Añadir usuarios</h6>
                        <p class="mb-0 opacity-75">Agrega usuarios al espacio de trabajo.</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 mb-4">

              <div class="py-md-1 align-items-center justify-content-center">
                <div class="list-group">
                  <a href="{{ route('admin.workspace.edit', $ws->id) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <i class="bi bi-pencil-square rounded-circle fa-2x flex-shrink-0"></i>
                    {{-- <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0"> --}}
                    <div class="d-flex gap-2 w-100 justify-content-between">
                      <div>
                        <h6 class="mb-0">Editar</h6>
                        <p class="mb-0 opacity-75">Cambia el nombre, subdominio y descripción de <strong>{{ $ws->nombre }}</strong>.</p>
                      </div>
                      {{-- <small class="opacity-50 text-nowrap">now</small> --}}
                    </div>
                  </a>
                  {{-- <a href="{{ route('admin.workspace.usuarios', $ws->id) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <i class="bi bi-people-fill rounded-circle fa-2x flex-shrink-0"></i>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                      <div>
                        <h6 class="mb-0">Añadir usuarios</h6>
                        <p class="mb-0 opacity-75">Agrega usuarios al espacio de trabajo.</p>
                      </div>
                    </div>
                  </a> --}}
                  {{-- <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                      <div>
                        <h6 class="mb-0">Third heading</h6>
                        <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                      </div>
                      <small class="opacity-50 text-nowrap">1w</small>
                    </div>
                  </a> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
