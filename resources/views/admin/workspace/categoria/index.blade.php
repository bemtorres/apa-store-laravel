
@extends('layouts.app')
@push('css')

{{-- <link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}

@endpush
@section('content')
<div class="container-fluid">

  @component('components.button._back')
    @slot('route', route('admin.workspace.show', $ws->id))
    @slot('color', 'dark')
    @slot('body', 'Categorías de ' . $ws->nombre)
  @endcomponent

  {{-- @include('admin.workspace._tabs') --}}
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              {{-- <th>id</th> --}}
              <th>domain</th>
              {{-- <th>estado</th> --}}
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categorias as $c)
            <tr>
              <td>{{ $c->nombre }}</td>
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
  {{-- <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script> --}}
@endpush
