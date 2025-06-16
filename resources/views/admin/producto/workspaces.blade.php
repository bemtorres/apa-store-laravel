@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @component('components.button._back')
      @slot('route', route('usuarios.index'))
      @slot('color', 'secondary')
      @slot('body', 'Perfil - ' . $u->nombre_completo())
    @endcomponent

    <div class="col-md-12">
      @include('admin.usuario._tabs_usuario')
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 mb-4">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="col-md-12 mb-3">
                    <div class="d-flex align-items-center">
                      <div class="avatar avatar-md">
                        <img class="avatar-img" src="{{ asset($u->getImg()) }}" alt="">
                      </div>
                      <div class="ms-2">
                        <span class="h6 mt-2 mt-sm-0">{{ $u->nombre_completo() }}</span>
                        <p class="small m-0">{{ $u->correo }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col mb-4">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table
                    table-hover
                    table-bordered
                    align-middle">
                      <thead>
                        <tr>
                          <th></th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                          @foreach ($detalleworkspaces as $d)
                            @php
                              $w = $d->workspace;
                            @endphp
                            <tr>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="">
                                    <img src="{{ asset($w->getPhoto()) }}" width="50" alt="">
                                  </div>
                                  <div class="ms-2">
                                    <span class="h6 mt-2 mt-sm-0">{{ $w->nombre }}</span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                {{ $d->getCargo() }}
                              </td>
                              <td>
                                <a href="{{ route('solicitud.index', $d->id) }}">Ir al espacio</a>
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
