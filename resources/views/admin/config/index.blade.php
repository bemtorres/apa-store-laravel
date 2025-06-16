
@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Configuraciones</h1>
  <div class="card shadow mb-4">
    <div class="card-body row">
      <div class="col-md-4">
        <div class="list-group">
          {{-- <a href="{{ route('utils.calendario') }}" class="list-group-item list-group-item-action">Carga Masiva Calendario</a> --}}
          <a href="{{ route('admin.config.zona.index') }}" class="list-group-item list-group-item-action">Zonas</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')

@endpush
