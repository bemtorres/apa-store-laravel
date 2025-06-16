@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @component('components.button._back')
      @slot('route', route('admin.config.index'))
      @slot('color', 'secondary')
      @slot('body', 'Zonas del sistema')
    @endcomponent

    <div class="col-md-12">
      @include('admin.config.zonas._tabs')
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="row">

            <div class="col mb-4">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table
                    table-sm
                    table-hover
                    align-middle">
                      <thead>
                        <tr>
                          <th>Sede</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                          @foreach ($sedes as $s)
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <div class="">
                                  <img src="{{ asset($s->getImg()) }}" width="50" alt="">
                                </div>
                                <div class="ms-2">
                                  <span class="h6 mt-2 mt-sm-0">{{ $s->nombre }}</span>
                                  @if ($s->activo)
                                    <i class="ms-2 fa fa-circle-check text-success"></i>
                                  @else
                                    <i class="ms-2 fa fa-times text-danger"></i>
                                  @endif
                                </div>
                              </div>
                            </td>
                            <td>
                              <a href="{{ route('admin.config.zona.edit', $s->id) }}" class="btn btn-sm btn-primary">editar</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
