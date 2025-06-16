
@extends('layouts.app')
@push('css')

<link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">

  @component('components.button._back')
    @slot('route', route('admin.workspace.show', $ws->id))
    @slot('color', 'dark')
    @slot('body', 'Articulos de ' . $ws->nombre)
    @slot('historial', [
      [route('admin.workspace.index'), 'Espacios'],
      [route('admin.workspace.show', $ws->id), $ws->nombre],
      ['','Editar']
    ])
  @endcomponent

  @include('admin.workspace.articulo._tabs')
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable">
          <thead>
            <tr>
              <th></th>
              <th>CÓDIGO</th>
              <th>NOMBRE</th>
              <th>STOCK</th>
              <th>STOCK CRITICO</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ws->articulos as $a)

            <tr>
              {{-- imagen del articulo en cuadro de 100 --}}
              {{-- <td>
                {{ $a->getPhoto() }}
              </td> --}}
              <td><img src="{{ asset($a->getPhoto()) }}" alt="" style="width: 60px;" class="img rounded"></td>
              <td>{{ $a->codigo }}</td>
              <td>{{ $a->nombre }}</td>
              <td>{{ $a->stock }}</td>
              <td>{{ $a->stock_critico }}</td>
              <td>
                <a href="{{ route('admin.workspace.articulos.edit', [$ws->id, $a->id]) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                <a href="{{ route('admin.workspace.articulos.destroy', [$ws->id, $a->id]) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
              </td>
              {{-- <td>{{ $ws->id }}</td> --}}
              {{-- <td><a href="{{ route('admin.workspace.show',$ws->id) }}">{{ $ws->id }}</a></td> --}}
              {{-- <td>{{ $u->nombre_completo() }}</td> --}}
              {{-- <td><small>{{ $ws->sede->nombre }}</small></td> --}}
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
