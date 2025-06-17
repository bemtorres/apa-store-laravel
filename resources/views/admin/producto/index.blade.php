
@extends('layouts.app')
@push('css')

<link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Productos</h1>
  @include('admin.producto._tabs')
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>CODIGO</th>
              <th>NOMBRE</th>
              <th>PRECIO</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productos as $p)
            <tr>
              <td>
                <div class="c-avatar">
                  <img src="{{ asset($p->present()->getPhoto()) }}" class="c-avatar-img" width="100px" alt="Imagen producto">
                </div>
              </td>
              <td>{{ $p->codigo }}</td>
              <td><a href="{{ route('admin.producto.edit',$p->idi) }}">{{ $p->nombre }}</a></td>
              {{-- <td>{{ $p->nombre }}</td> --}}
              <td>$ {{ $p->getPrecio() }}</td>
              <td>
                @if ($p->activo)
                  <span class="badge bg-success">DISPONIBLE</span
                @else
                  <span class="badge bg-danger">ELIMINADO</span
                @endif
              </td>
              <td>
                <form action="{{ route('admin.producto.update', $p->idi) }}" method="post" class="mb-4">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="block" value="delete">
                  <input type="hidden" name="id" value="{{ $p->idi }}">
                  @if ($p->activo)
                    <button type="submit" class="btn btn-danger btn-sm text-white">¿DESACTIVAR?</button>
                  @else
                    <button type="submit" class="btn btn-success btn-sm text-white">¿ACTIVAR?</button>
                  @endif
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
  <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script>
@endpush
