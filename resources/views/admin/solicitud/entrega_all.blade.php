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
      @slot('route', route('solicitud.indexA', $ws->id))
      @slot('color', 'secondary')
      @slot('body', 'Recibir articulos de ' . $ws->nombre)
    @endcomponent
    <div class="my-2"></div>
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-sm" id="dataTable">
              <thead>
                <tr>
                  <th>FECHA SOLICITUD</th>
                  <th>SOLICITANTE</th>
                  <th>FECHA ENTREGA</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($prestamos as $p)
                <tr id="producto-tabla-{{ $p->id }}">
                  <td>{{ $p->getFechaSolicitud() }}</td>
                  <td class=" text-start">
                    <div class="d-flex align-items-center">
                      <div class="avatar avatar-lg">
                        <img class="avatar-img" src="{{ asset($p->usuario_solicitante->getPhoto()) }}" alt="">
                      </div>
                      <div class="ms-2">
                        <p class="h6 mt-2 mt-sm-0">{{ $p->usuario_solicitante->nombre_completo() }}</p>
                        <p class="small m-0">{{ $p->usuario_solicitante->correo }}</p>
                      </div>
                    </div>
                  </td>
                  <td>{{ $p->getFechaEntrega() }}</td>
                  <td>
                    <a href="{{ route('solicitud.prestamos', [$ws->id, $p->id]) }}" class="btn btn-warning btn-sm"><strong>DETALLE</strong></a>
                  </td>
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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script>
@endpush
