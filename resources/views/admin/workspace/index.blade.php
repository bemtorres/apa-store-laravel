
@extends('layouts.app')
@push('css')

<link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Workspaces</h1>

  <div class="mb-2">
    <small>Organizan proyectos y tareas en entornos separados, permitiendo una gestión eficiente y colaborativa. Personaliza cada espacio, controla permisos y mantiene la información estructurada y accesible para tu equipo.</small>
  </div>

  @include('admin.workspace._tabs')
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th></th>
              <th>NOMBRE</th>
              <th class="text-center">CANTIDAD DE ARTICULOS</th>
              <th class="text-center">PERSONAS</th>
              <th>SEDE</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($workspaces as $ws)
            <tr>
              <td>{{ $ws->id }}</td>
              <td><img src="{{ asset($ws->getPhoto()) }}" class="rounded"  alt="" style="width: 60px;" width="60px"></td>
              <td><a href="{{ route('admin.workspace.show',$ws->id) }}">{{ $ws->nombre }}</a></td>
              <td class="text-center">{{ $ws->articulos->count() }}</td>
              <td class="text-center">{{ $ws->detalles->count() }}</td>
              <td><small>{{ $ws->sede->nombre }}</small></td>
              {{-- <td>
                @if ($u->tipo_usuario == 1)
                  <i class="fa-solid fa-user-shield"></i>
                @elseif ($u->tipo_usuario == 2)
                  <i class="fa-solid fa-user text-primary"></i>
                @endif
                @if ($u->inte_google_id())
                  <span class="ms-2"><i class="fa-brands fa-google text-danger"></i></span>
                @endif
              </td> --}}
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
