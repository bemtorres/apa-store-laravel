
@extends('layouts.app')
@push('css')
<style>
.fixed-card {
    width: 100%;
    height: 350px;
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
    height: 150px;
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
  <h1 class="h3 mb-2 text-gray-800">Espacio de trabajos</h1>
  {{-- @include('admin.solicitud._tabs') --}}
  <div class="row">
    @foreach ($detalle_workspaces as $detalle)
      @php
        $ws = $detalle->workspace;
      @endphp
      <div class="col-6 col-md-3">
        <div class="card fixed-card handle mb-3" onclick="window.location='{{ route('solicitud.indexA', $ws->id) }}'">
          <img class="card-img-top fixed-img" src="{{ asset($ws->getPhoto()) }}" alt="Title" />
          <div class="card-body">
            {!! $detalle->getCargoHtml() !!}
            <h4 class="card-title fixed-title text-center mt-2">{{ $ws->nombre }}</h4>
            <p class="card-text fixed-text">{{ $ws->descripcion }}</p>
          </div>
          {{-- <div class="card-footer">
            <a href="{{  }}" class="btn btn-primary fixed-button">INGRESAR</a>
          </div> --}}
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
@push('js')
@endpush
