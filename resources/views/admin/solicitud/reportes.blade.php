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

@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @component('components.button._back')
      @slot('route', route('solicitud.indexA', $ws->id))
      @slot('color', 'secondary')
      @slot('body', 'Reportes de solicitudes ' . $ws->nombre)
    @endcomponent
    <div class="my-2"></div>
    @if ($articulo_solicitado->articulo ?? false)
    <div class="col-md-3 ">
      <div class="card">
        <div class="card-body">
            <img class="card-img-top" src="{{ asset($articulo_solicitado->articulo->getPhoto()) }}" alt="Title" />
            <p class="card-title mt-3">{{$articulo_solicitado->articulo->nombre}}</p>
            <p class="card-text">Articulo más solicitado {{ $articulo_solicitado->total_solicitado ?? 0 }} veces</p>
        </div>
      </div>
    </div>
    @endif

    <div class="col-md-6">
      <div class="card mb-3 handle fixed-card" onclick="window.location='{{ route('solicitud.reportesExcel', $ws->id) }}'">
        <div class="card-body d-flex gap-3 py-5">
          <i class="bi bi-file-earmark-excel rounded-circle fa-2x flex-shrink-0 text-success"></i>
          <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
              <h2 class="mb-0">Descargar solicitudes generales</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="card mb-3 handle fixed-card" onclick="window.location='{{ route('solicitud.reportesDetalladoExcel', $ws->id) }}'">
        <div class="card-body d-flex gap-3 py-5">
          <i class="bi bi-file-earmark-excel rounded-circle fa-2x flex-shrink-0 text-success"></i>
          <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
              <h2 class="mb-0">Descargar detalle de las solicitudes</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3"></div>
    <div class="col-md-6">
      <div class="card text-start">
        <div class="card-body">
          <div id="graficoSolicitudes"></div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5>Usuarios con Mayores Solicitudes</h5>
          <table class="table">
            <thead>
              <tr>
                <th>Usuario</th>
                <th class="text-center">Total de Solicitudes</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($usuarios_mas_solicitantes as $usuario)
              @if ($loop->index == 6)
                  @break
              @endif
              <tr>
                  <td>{{ $usuario->usuario_solicitante->nombre_completo() ?? 'Desconocido' }}</td>
                  <td class="text-center">{{ $usuario->total_solicitudes }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
  <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Datos enviados desde el controlador
        const productos = @json($productos_mas_solicitados);

        // Extraer nombres y totales
        const nombres = productos.map(item => item.articulo.nombre);
        const totales = productos.map(item => item.total_solicitado);

        // Configurar el gráfico
        const options = {
            chart: {
                type: 'bar',
                height: 350
            },
            series: [{
                name: 'Total Solicitado',
                data: totales
            }],
            xaxis: {
                categories: nombres
            },
            title: {
                text: 'Productos Más Solicitados',
                align: 'center'
            },
            colors: ['#008FFB'],
            dataLabels: {
                enabled: true
            }
        };

        // Renderizar el gráfico
        const chart = new ApexCharts(document.querySelector("#graficoSolicitudes"), options);
        chart.render();

    });
</script>
@endpush
