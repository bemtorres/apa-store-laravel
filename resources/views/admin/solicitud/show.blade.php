@extends('layouts.app')
@push('css')
<style>

.fixed-card {
    width: 100%;
    /* height: 350px; */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: box-shadow 0.3s ease; /* Añade una transición suave */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra inicial */
}

.fixed-card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Sombra más intensa al hacer hover */
}

.fixed-img {
    width: 100%;
    /* height: 150px; */
    object-fit: cover;
}

.handle {
  cursor: pointer;
}

.card-body {
    flex-grow: 1;
}

.fixed-title {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.fixed-text {
    font-size: 1rem;
    flex-grow: 1;
}

.fixed-button {
    margin-top: 10px;
}
</style>


@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @component('components.button._back')
      @slot('route', route('solicitud.index'))
      @slot('color', 'secondary')
      @slot('body', 'Workspace - ' . $ws->nombre)
    @endcomponent

    <div class="my-2"></div>
    <div class="col-md-6">
      <div class="card mb-3 handle fixed-card" onclick="window.location='{{ route('solicitud.salida', $ws->id) }}'">
        <div class="card-body d-flex gap-3 py-5">
          <i class="bi bi-box-arrow-in-up rounded-circle fa-2x flex-shrink-0 text-danger"></i>
          <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
              <h2 class="mb-0">Solicitar articulos</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card mb-3 handle fixed-card" onclick="window.location='{{ route('solicitud.entrega', $ws->id) }}'">
        <div class="card-body d-flex gap-3 py-5">
          <i class="bi bi-box-arrow-in-down rounded-circle fa-2x flex-shrink-0 text-success"></i>
          <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
              <h2 class="mb-0">Recepción de articulos</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>

    {{-- <div class="col-md-6">
      <div class="card mb-3 handle fixed-card" onclick="window.location='{{ route('solicitud.entrega', $ws->id) }}'">
        <div class="card-body d-flex gap-3 py-5">
          <i class="bi bi-box-arrow-in-down rounded-circle fa-2x flex-shrink-0 text-success"></i>
          <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
              <h2 class="mb-0">Recepción de articulos</h2>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <div class="col-md-4">
      <div class="card mb-3 handle fixed-card" onclick="window.location='{{ route('solicitud.entregados', $ws->id) }}'">
        <div class="card-body d-flex gap-3 py-5">
          <i class="bi bi-check rounded-circle fa-2x flex-shrink-0 text-success"></i>
          <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
              <h2 class="mb-0">Recepciones</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-3 handle fixed-card" onclick="window.location='{{ route('solicitud.reportes', $ws->id) }}'">
        <div class="card-body d-flex gap-3 py-5">
          <i class="bi bi-graph-up-arrow rounded-circle fa-2x flex-shrink-0 text-warning"></i>
          <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
              <h2 class="mb-0">Reportes</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
