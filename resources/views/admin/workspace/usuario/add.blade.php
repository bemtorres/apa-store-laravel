
@extends('layouts.app')
@push('css')

<link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

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
              <th>RUT</th>
              <th>NOMBRE</th>
              <th>CORREO</th>
              <th>CARGO</th>
              <th>SEDE</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($usuario_not  as $un)
            <tr>
              <td>{{ $un->run }}</td>
              <td>{{ $un->nombre_completo() }}</td>
              <td>{{ $un->correo }}</td>
              <td>{{ $un->cargo }}</td>
              <td>{{ $un->sede->nombre }}</td>
              <td>
                <form action="{{ route('admin.workspace.usuarios.add.store', $ws->id) }}" method="POST" class="form-submit row">
                  @csrf
                  <input type="hidden" name="usuario_id" value="{{ $un->id }}">
                  <input type="hidden" name="espacio_id" value="{{ $ws->id }}">
                  <div class="mb-3 col-8">
                    <select
                      class="form-select form-select-sm"
                      name="cargo"
                      id="cargo"
                    >
                      @foreach ($cargos as $key => $c)
                        <option value="{{ $key }}">{{ $c }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-3">
                    <button type="submit" class="btn btn-success btn-sm ">Agregar</button>
                  </div>
                </form>
              </td>
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
