@extends('layouts.app')
@section('css')

@endsection
@section('content')
<div class="row">
  <div class="col-md-12 row text-center">
    <div class="col-md-6">
      <div class="card">
        <img class="card-img-top" src="{{ asset('pedidos.png') }}" alt="">
        <div class="card-body px-3">
          <h2 class="fw-bold text-success">¡Modo Pro Activado! 🚀</h2>
          <h5 class="card-title">Ahora puedes enviar tus compras por WhatsApp al ingresar tu número de teléfono</h5>
          <div class="col-lg-12 mx-auto">
            <p class="lead mb-4">Para empezar, ingresa tu número de teléfono y listo. ¡Disfruta de la comodidad de vender rápidamente a través de WhatsApp!</p>
            <a href="{{ route('admin.tienda.index') }}" class="btn btn-lg btn-success text-white text-bold">Añadir número de Whatsapp <i class="bi bi-whatsapp" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="mb-3">
        <div class=" px-3">
          <h2 class="display-6 fw-bold">Hola {{ current_user()->nombre }}! 🖐️</h2>
          <h5 class="card-title">Te damos la bienvenida a <strong>{{ current_tienda()->nombre }}!</strong></h5>

          <div class="">
            <div class="col-lg-12 mx-auto">
              <p class="lead mb-4">
              </p>
              <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-3">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-6 mb-3">
          <div class="card rounded bg-primary text-white">
            <div class="card-body">
              <div class="fs-4 fw-semibold" id="count-docs"></div>
              <div><strong>Total de productos</strong></div>
            </div>
          </div>
        </div>
        <div class="col-6 mb-3">
          <div class="card rounded bg-warning text-white">
            <div class="card-body">
              <div class="fs-4 fw-semibold" id="count-pedidos"></div>
              <div><strong>Total de pedidos</strong></div>
            </div>
          </div>
        </div>
        <div class="col-6 mb-3">
          <div class="card rounded bg-success text-white">
            <div class="card-body">
              <div class="fs-4 fw-semibold">$<span id="count-ventas"></span></div>
              <div><strong>Total de ventas</strong></div>
            </div>
          </div>
        </div>
        {{-- <div class="col-6">
          <div class="card rounded bg-white text-tienda-primary">
            <div class="card-body">
              <div class="fs-4 fw-semibold" id="count-pages">asdasdasd</div>
              <div><strong>Total de páginas calculadas</strong></div>
            </div>
          </div>
        </div> --}}
      </div>
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card text-left bg-dark text-success border-success">
            <div class="row g-0">
              <!-- Imagen a la izquierda -->
              <div class="col-md-4">
                <img src="{{ asset('cat-crazy-cat.gif') }}" class="img-fluid rounded-start" alt="Imagen de gato loco">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h6 class="text-warning">Ahora puedes personalizar tu página web</h6>
                  <p class="text-light mb-4">Haz que tu tienda sea única con un diseño que se adapte a tus necesidades. Personaliza tu página web y lleva tu tienda al siguiente nivel.</p>
                  <a href="{{ route('admin.tienda.programador') }}" class="btn btn-primary text-white">
                    Personaliza tu tienda <i class="bi bi-code-square"></i>
                  </a>
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
@push('js')
<script>
  function animateValue(id, end, duration = 1000) {
    const el = document.getElementById(id);
    if (!el) return;

    const start = 0;
    const range = end - start;
    const startTime = performance.now();

    function step(currentTime) {
      const progress = Math.min((currentTime - startTime) / duration, 1);
      const value = Math.floor(progress * range + start);
      el.textContent = value.toLocaleString('es-CL');
      if (progress < 1) {
        requestAnimationFrame(step);
      }
    }

    requestAnimationFrame(step);
  }

  document.addEventListener('DOMContentLoaded', () => {
    animateValue('count-docs',{{ $productos_count }}, 1200);
    animateValue('count-pedidos',{{ rand(100, 4000) }}, 1200);
    animateValue('count-ventas',{{ rand(500000, 1000000000) }}, 1200);
  });
</script>
@endpush
