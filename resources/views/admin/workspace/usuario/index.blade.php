
@extends('layouts.app')
@push('css')

{{-- <link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}

@endpush
@section('content')
<div class="container-fluid">

  @component('components.button._back')
    @slot('route', route('admin.workspace.show', $ws->id))
    @slot('color', 'dark')
    @slot('body', 'Usuario asociados' . $ws->nombre)
  @endcomponent

  @include('admin.workspace.usuario._tabs')
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>RUN</th>
              <th>NOMBRE</th>
              <th>CORREO</th>
              <th>SEDE</th>
              <th>CARGO</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($detalles  as $d)
              @php
                $un = $d->usuario;
              @endphp
            <tr>
              <td>{{ $un->run }}</td>
              <td>{{ $un->nombre_completo() }}</td>
              <td>{{ $un->correo }}</td>
              <td>{{ $un->sede->nombre }}</td>
              <td>{{ $d->getCargo() }}</td>
              <td>
                <form class="form-submit" action="{{ route('admin.workspace.usuarios.add.delete', $ws->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="id_detalle" value="{{ $d->id }}">
                  <input type="hidden" name="id_usuario" value="{{ $un->id }}">
                  <button type="submit" class="btn btn-danger btn-sm">Quitar</button>
                </form>
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
  {{-- <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script> --}}
@endpush
