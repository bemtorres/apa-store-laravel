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
            <div class="col-lg-4 mb-4">
              <div class="card mb-4">
                <div class="card-body">

                  <div class="col-md-12 mb-3">
                    <div class="d-flex align-items-center">
                      <div class="avatar avatar-md">
                        <img class="avatar-img" src="{{ asset($u->getPhoto()) }}" alt="">
                      </div>
                      <div class="ms-2">
                        <span class="h6 mt-2 mt-sm-0">{{ $u->nombre_completo() }}</span>
                        <p class="small m-0">{{ $u->correo }}</p>
                      </div>
                    </div>
                  </div>

                  {{-- <h4 class="m-0 font-weight-bold">
                    {{ $u->nombre_completo() }}
                  </h4> --}}
                  {{-- <div class="text-center">
                    <img src="{{ asset($p->present()->getImagen()) }}" width="300px" class="rounded mt-3 mb-4" alt="...">
                  </div> --}}
                </div>
                <div class="card-footer text-center">
                  <h3>
                  </h3>
                </div>
                {{-- <div class="card-footer text-center">
                  <h4>
                    @if ($p->estado == 1)
                      <span class="badge badge-primary">Borrador</span>
                    @else
                    @if ($p->estado == 2)
                      <span class="badge badge-dark">No disponible</span>
                    @else
                      <span class="badge badge-success">Disponible</span>
                    @endif
                    @endif
                  </h4>
                </div> --}}
              </div>
            </div>

            <div class="col">
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
                            @foreach ($u->detalleSede as $d)
                              @php
                                $s = $d->sede;
                              @endphp
                            <tr>
                                <td>
                                  <div class="d-flex align-items-center">
                                    <div class="">
                                      <img src="{{ asset($s->getImg()) }}" width="50" alt="">
                                    </div>
                                    <div class="ms-2">
                                      <span class="h6 mt-2 mt-sm-0">{{ $s->nombre }}</span>
                                      @if ($d->activo)
                                        <i class="ms-2 fa fa-circle-check text-success"></i>
                                      @else
                                        <i class="ms-2 fa fa-times text-danger"></i>
                                      @endif
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  {{ $d->getCargo() }}
                                </td>
                                <td>
                                    {{-- @csrf
                                    @method('PUT')
                                    <input type="hidden" name="sede_id" value="{{ $s->id }}">

                                    <select class="form-select form-select-sm" name="activar" id="activar">
                                      <option value="si" {{ $s->checked ? 'selected' : '' }}>Activar</option>
                                      <option value="no" {{ !$s->checked ? 'selected' : '' }}>Desactivar</option>
                                    </select> --}}

                                    {{-- @if ($s->checked)
                                      <select class="form-select form-select-sm" name="cargo" id="cargo">
                                        @foreach ($cargos as $key => $c)
                                          <option value="{{ $key }}" {{ $s->cargo == $key ? 'selected' : '' }}>{{ $c }}</option>
                                        @endforeach
                                      </select>
                                    @endif --}}

                                    {{-- @if ($s->checked)
                                      <button type="submit" name="btn_active" class="btn btn-success text-white btn-sm">Guardar</button>
                                    @else
                                      <button type="submit" name="btn_active" class="btn btn-dark text-white btn-sm">Guardar</button>
                                    @endif --}}
                                    {{-- <button type="submit" name="btn_active" class="btn btn-danger text-white btn-sm">Activar</button> --}}
                                  </form>
                                </td>


                              <td class="text-center">
                                {{-- @if ($s->checked)
                                  <button type="submit" class="btn btn-success btn-sm">Activado</button>
                                @else
                                  <button type="submit" class="btn btn-danger btn-sm">Activar</button>
                                @endif --}}
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

            {{-- <div class="col-lg-8 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
