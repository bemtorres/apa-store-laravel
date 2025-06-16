@extends('layouts.pantalla.app')
@section('css')

@endsection
@section('content')

<pantalla-view :subdominio="'{{ $p->subdomain }}'"></pantalla-view>
{{-- <div class="row mt-2">
  <h2 class="display-6 fw-bold">{{ $p->nombre }}</h2>
  <small>{{ $p->descripcion }}</small>
  <div class="col-12 mt-1">
    <div class="card shadow mb-3" style="height: 1200px">
      <div class="card-body px-3 text-center">
        @if ($info)
          @if (str_contains($info['url'], 'pdf'))
              <embed src="{{ $info['assets'] }}" type="application/pdf" width="100%" height="600px">
          @else
              <img src="{{ $info['assets'] }}" alt="Archivo subido" class="img-fluid">
          @endif
        @endif
      </div>
    </div>
  </div>
</div> --}}


<button

  type="button"
  class="btn btn-primary btn-lg"
  data-coreui-toggle="modal"
  data-coreui-target="#modalId"
>
  Launch
</button>


<button

  type="button"
  class="btn btn-primary btn-lg"
  data-coreui-toggle="modal"
  data-coreui-target="#modalAlert"
>
  modalAlert
</button>

<div
  class="modal fade"
  id="modalId"
  tabindex="-1"
  role="dialog"
  aria-labelledby="modalTitleId"
  aria-hidden="true"
>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleId">
          Modal title
        </h5>
        <button
          type="button"
          class="btn-close"
          data-coreui-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">Add rows here</div>
      </div>
      <div class="modal-footer">
        <button
          type="button"
          class="btn btn-secondary"
          data-coreui-dismiss="modal"
        >
          Close
        </button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<div
  class="modal fade"
  id="modalAlert"
  tabindex="-1"
  role="dialog"
  aria-labelledby="modalTitleId"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h5 class="modal-title" id="modalTitleId">
          Modal title
        </h5>
        <button
          type="button"
          class="btn-close"
          data-coreui-dismiss="modal"
          aria-label="Close"
        ></button>
      </div> --}}
      <div class="modal-body my-5">
        <div class="container-fluid">
          El profesor no ha subido contenido
        </div>
      </div>
      {{-- <div class="modal-footer">
        <button
          type="button"
          class="btn btn-secondary"
          data-coreui-dismiss="modal"
        >
          Close
        </button>
        <button type="button" class="btn btn-primary">Save</button>
      </div> --}}
    </div>
  </div>
</div>

@endsection
@push('js')
<script>
  document.addEventListener('DOMContentLoaded', function() {

    var modalId = document.getElementById('modalId');
    modalId.addEventListener('show.coreui.modal', function (event) {
      let button = event.relatedTarget;
      let recipient = button.getAttribute('data-bs-whatever');
    });

    modalId.click();

  });
</script>
{{-- <script>
  setTimeout(function() {
      location.reload();
  }, 10000); // 300000 milisegundos = 5 minutos
</script> --}}
@endpush
