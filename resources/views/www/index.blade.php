@extends('layouts.pantalla.app')
@section('css')

@endsection
@section('content')
<div class="row mt-2">
  @foreach ($pantallas as $p)
    <div class="col-2">
      <div class="card shadow mb-3 handle" onclick="window.location = '{{ route('www.show', $p->subdomain) }}'">
        <div class="card-body px-3">
          <h2 class="display-6 fw-bold">{{ $p->nombre }}</h2>
          <p class="lead">{{ $p->descripcion }}</p>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
