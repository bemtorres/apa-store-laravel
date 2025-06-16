
@extends('layouts.app')
@push('css')

<link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')

@component('components.button._back')
{{-- @slot('route', route('ase.index')) --}}
  @slot('color', 'secondary')
  @slot('body', 'Solicitudes para realizar fichas')
@endcomponent
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ENVIADO</th>
              <th>TIPO</th>
              <th>TO</th>
              <th>CC</th>
              <th>ASUNTO</th>
              <th>MENSAJE</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($mensajes as $m)
            <tr>
              <td>{{ $m->getFechaRegistro()->getDatetime() }}</td>
              <td>
                <span class="badge bg-primary">{{ $m->type }}</span>
              </td>
              <td><small>{{ $m->to }}</small></td>
              <td><small>{{ $m->cc }}</small></td>
              <td>{{ $m->subject }}</td>
              <td>{{ $m->message }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{-- <div>
          {{ $postulantes->links() }}
        </div> --}}
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
