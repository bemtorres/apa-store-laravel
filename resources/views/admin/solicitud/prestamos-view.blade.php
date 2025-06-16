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
<link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @component('components.button._back')
      @slot('route', route('solicitud.entrega', $ws->id))
      @slot('color', 'secondary')
      @slot('body', 'Recibir articulos de ' . $ws->nombre)
    @endcomponent
    <div class="my-2"></div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-center">
            <div class="avatar avatar-xl">
              <img class="avatar-img" src="{{ asset($prestamo->usuario_solicitante->getPhoto()) }}" alt="">
            </div>
            <div class="ms-2">
              <p class="h6 mt-2 mt-sm-0">{{ $prestamo->usuario_solicitante->nombre_completo() }}</p>
              <p class="small m-0">{{ $prestamo->usuario_solicitante->correo }}</p>
              <p class="badge badge-pill bg-dark">{{ $prestamo->usuario_solicitante->sede->nombre }}</p>
            </div>
          </div>
          <hr>
          <div class="col-md-12">
            <div class="d-grid">
              <a href="{{ route('solicitud.prestamos',[$ws->id, $prestamo->id]) }}" class="btn btn-block btn-outline-warning">Ver detalle</a>
              <a href="{{ route('solicitud.prestamosPDF',[$ws->id, $prestamo->id]) }}" target="_blink" class="btn btn-block btn-danger mt-3">DESCARGAR PDF</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      {{-- <div class="card text-start">
        <div class="card-body">
          Solicitado el: <strong>{{ $prestamo->getFechaSolicitud() }}</strong>
          <hr>
          Comentario de entrada: <strong>{{ $prestamo->comentario_entrega ?? 'Sin comentario' }}</strong>
        </div>
      </div> --}}

      <div class="card shadow mb-4 mt-1">
        <div class="card-body">
          <iframe id="pdf-viewer" src="{{ route('solicitud.prestamosPDF',[$ws->id, $prestamo->id]) }}" width="100%" height="500px"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
  <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js" integrity="sha512-Z8CqofpIcnJN80feS2uccz+pXWgZzeKxDsDNMD/dJ6997/LSRY+W4NmEt9acwR+Gt9OHN0kkI1CTianCwoqcjQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    // $(document).ready(function() {
    //   $('#dataTable').DataTable();
    // });
  </script>
@endpush
