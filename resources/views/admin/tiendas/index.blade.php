
@extends('layouts.app')
@push('css')

<link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800">TIENDAS</h1>

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>FECHA</th>
              <th>DOMINIO</th>
              <th>NOMBRE</th>
              <th>USUARIO</th>
              <th>CORREO</th>
              <th>WHATSAPP</th>
              <th>ESTADO</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tiendas as $t)
            <tr>
              <td>{{ $t->created_at->format('d/m/Y') }}</td>
              <td>
                <div class="c-avatar">
                  <img src="{{ asset($t->present()->getLogo()) }}" class="c-avatar-img" width="100px" alt="Imagen producto">
                </div>
              </td>
              <td>{{ $t->dominio }}</td>
              <td><a href="{{ route('admin.tiendas.show',$t->dominio) }}">{{ $t->nombre }}</a></td>
              <td>{{ $t->usuario->nombre }}</td>
              <td>{{ $t->usuario->correo }}</td>
              <td>{{ $t->getInfoWsp() }}</td>
              <td>
                @if ($t->activo)
                  <span class="badge bg-success">DISPONIBLE</span
                @else
                  <span class="badge bg-danger">ELIMINADA</span
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
  <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script>
@endpush
