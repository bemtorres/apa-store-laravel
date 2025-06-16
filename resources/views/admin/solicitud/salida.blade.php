@extends('layouts.app')
@push('css')
<style>

.fixed-card {
    width: 100%;
    /* height: 350px; */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: box-shadow 0.3s ease; /* Añade una transición suave */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra inicial */
}

.fixed-card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Sombra más intensa al hacer hover */
}

.fixed-img {
    width: 100%;
    /* height: 150px; */
    object-fit: cover;
}

.handle {
  cursor: pointer;
}

.card-body {
    flex-grow: 1;
}

.fixed-title {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.fixed-text {
    font-size: 1rem;
    flex-grow: 1;
}

.fixed-button {
    margin-top: 10px;
}

.select2-container .select2-choice {
    display: block!important;
    height: 36px!important;
    white-space: nowrap!important;
    line-height: 26px!important;
}
</style>
<link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="container-fluid text-xs">
  <div class="row">
    @component('components.button._back')
      @slot('route', route('solicitud.indexA', $ws->id))
      @slot('color', 'secondary')
      @slot('body', 'Entregar articulos de ' . $ws->nombre)
    @endcomponent

    <div class="my-2"></div>
    <div class="col-md-12"></div>
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-sm" id="dataTable">
              <thead>
                <tr>
                  <th></th>
                  <th>CÓDIGO</th>
                  <th>NOMBRE</th>
                  <th>CANTIDAD</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($ws->articulos as $a)
                <tr id="producto-tabla-{{ $a->id }}">
                  <td><img src="{{ asset($a->getPhoto()) }}" alt="" style="width: 60px;" class="img rounded"></td>
                  <td>{{ $a->codigo }}</td>
                  <td>{{ $a->nombre }}</td>
                  <td>{{ $a->stock }}</td>
                  <td>
                    <button class="btn btn-success rounded-pill text-white btn-sm" onclick="agregarAlCarrito('{{ $a->id }}', '{{ $a->nombre }}', '{{ asset($a->getPhoto()) }}',{{ $a->stock }})">
                      <strong>+</strong>
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Carrito de compras -->
    <div class="col-md-6 mb-3">
      <div class="card mb-3">
        <div class="card-body">
          <h3>Solicitud de productos</h3>

          <form action="{{ route('solicitud.salida.store', $ws->id) }}" class="form-submit row" method="POST">
            @csrf
            <div class="col-md-3 text-center">
              <img src="{{ asset($a->getPhoto()) }}" id="user_img" alt="" style="width: 60px;" class="img rounded img-responsive">
              <br>
              <small><span id="user_name"></span></small>
            </div>
            <div class="col-md-9 mb-3">
              <label for="">Buscar usuario</label>
              <select class="js-example-basic-single form-select" id="select_id" name="id_usuario" required>
                @foreach ($usuarios as $u)
                  <option value="{{ $u['id'] }}">{{ $u['run'] . ' | ' . $u['nombre_completo'] . ' | ' . $u['correo'] }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-12 mb-3">
              <div class="form-group row">
                <label class="col-sm-12" for="comentario">Comentario</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="comentario" id="comentario" value=""/>
                </div>
              </div>
            </div>

            <div class="mt-3">
              <ul id="carrito" class="list-group mb-3">
                <div class="card">
                  <div class="card-body">
                    <p>Sin productos</p>
                  </div>
                </div>

              </ul>
              {{-- <h4>Total: $<span id="total">0.00</span></h4> --}}
              <div class="d-grid ">
                <button type="submit" class="btn btn-primary btn-lg btn-block" disabled id="btn-solicitud">SOLICITAR</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
  <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    let carrito = [];
    let productos_add = [];

    function agregarAlCarrito(id, nombre, imagen, stockDisponible) {
      // Verificar si el producto ya está en el carrito
      const index = carrito.findIndex(item => item.id === id);

      if (index !== -1) {
        // Si el producto ya está en el carrito, incrementar la cantidad si no supera el stock disponible
        if (carrito[index].cantidad < stockDisponible) {
          carrito[index].cantidad++;
          productos_add[index].cant++;
        } else {
          alert("No puedes añadir más de la cantidad disponible en stock.");
          return;
        }
      } else {
        // Si el producto no está en el carrito, agregarlo con cantidad 1
        carrito.push({ id, nombre, imagen, cantidad: 1 });
        productos_add.push({ id, cant: 1 });
      }

      actualizarCarrito();
    }

    function actualizarCarrito() {
      const carritoElement = document.getElementById('carrito');
      const btnSolicitud = document.getElementById('btn-solicitud');
      carritoElement.innerHTML = ''; // Limpiar el carrito

      if (carrito.length === 0) {
        carritoElement.innerHTML = '<div class="card"><div class="card-body"><p>Sin productos</p></div></div>';
        btnSolicitud.disabled = true;
      } else {
        btnSolicitud.disabled = false;

        // Renderizar cada producto en el carrito
        carrito.forEach((item, index) => {
          carritoElement.innerHTML += `
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <img src="${item.imagen}" alt="${item.nombre}" style="width: 40px; height: 40px; margin-right: 10px;">
                <span>${item.nombre} (Cantidad: ${item.cantidad})</span>
              </div>
              <button class="btn btn-sm btn-danger" onclick="eliminarDelCarrito(${index})">Eliminar</button>
            </li>
            <input type="hidden" name="articulos[]" value="${item.id}">
            <input type="hidden" name="cantidades[]" value="${item.cantidad}">
          `;
        });
      }
    }

    function eliminarDelCarrito(index) {
      // Eliminar el producto del carrito y de productos_add por su índice
      carrito.splice(index, 1);
      productos_add.splice(index, 1);
      actualizarCarrito();
    }



    const users = @json($usuarios);

    function buscarUsuario(id) {
        const user = users.find(u => u.id === id);
        console.log(user);

        if (user) {
            document.getElementById('user_img').src = user.img;
            document.getElementById('user_name').textContent = user.nombre_completo;
        } else {
            console.log("Usuario no encontrado");
        }
    }
    $(document).ready(function() {

      $('#dataTable').DataTable();

      $('.js-example-basic-single').select2({
        placeholder: "Selecciona un usuario",
        allowClear: true
      });

      $('.js-example-basic-single').on('change', function() {
        const valorSeleccionado = parseInt($(this).val(), 10);
        console.log("Valor seleccionado con Select2:", valorSeleccionado);
        buscarUsuario(valorSeleccionado);
      });
    });

    buscarUsuario(parseInt($('.js-example-basic-single').val(), 10));
  </script>
@endpush
