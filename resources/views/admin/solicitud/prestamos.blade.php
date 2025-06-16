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
          <form class="form-submit" action="{{ route('solicitud.prestamos', [$ws->id,$prestamo->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-12">
              <div class="d-grid">
                @if ($prestamo->estado == 1)

                  <div class="col-md-12 mb-3">
                    <div class="form-group row">
                      <label class="col-sm-12" for="comentario">Comentario al recibir</label>
                      <div class="col-sm-12">
                        <textarea name="comentario" id="comentario" cols="10" rows="5" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success text-white mb-3">CONFIRMAR ENTREGA</button>
                @else
                  {{-- <button disabled class="btn btn-success">RECIBIDO</button> --}}
                  <div class="alert alert-primary alert-dismissible text-center mb-3"
                    role="alert">
                    <strong>¡Productos Entregados!</strong>
                  </div>
                @endif

                <a href="{{ route('solicitud.prestamosViewPDF',[$ws->id, $prestamo->id]) }}" class="btn btn-block btn-outline-danger">Ver PDF</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card text-start">
        <div class="card-body">
          Solicitado el: <strong>{{ $prestamo->getFechaSolicitud() }}</strong>
          <hr>
          Comentario de entrada: <strong>{{ $prestamo->comentario_entrega ?? 'Sin comentario' }}</strong>
        </div>
      </div>

      <div class="card shadow mb-4 mt-1">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-sm" id="dataTable">
              <thead>
                <tr>
                  <th></th>
                  <th>CÓDIGO</th>
                  <th>NOMBRE</th>
                  <th>CANTIDAD</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($prestamo->detalle as $dd)
                  @php
                      $a = $dd->articulo;
                  @endphp
                <tr>
                  <td><img src="{{ asset($a->getPhoto()) }}" alt="" style="width: 60px;" class="img rounded"></td>
                  <td>{{ $a->codigo }}</td>
                  <td>{{ $a->nombre }}</td>
                  <td>{{ $dd->cantidad }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
  <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <script>
    // $(document).ready(function() {
    //   $('#dataTable').DataTable();
    // });
  </script>
@endpush
