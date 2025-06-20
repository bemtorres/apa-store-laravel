<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --color-principal: {{ $t->getColorFondo() }};
        }

        body {
          background-color: #f3f3f3;
        }
    </style>
    @if ($t->getInfoCssStyles())
    <style>
      {!! $t->getInfoCssStyles() !!}
    </style>
    @endif
</head>
<body class="min-h-screen flex flex-col" id="body">

  <nav class="bg-[var(--color-principal)] p-4" id="nav">
    <div class="max-w-7xl mx-auto flex justify-between items-center" id="nav-container">
      <div class="flex items-center space-x-3" id="logo-container">
        <img src="{{ asset($t->present()->getLogo()) }}" alt="Logo" class="h-10" id="logo">
        <span class="text-white text-xl font-bold" id="store-name">{{ $t->nombre }}</span>
      </div>
      <ul class="flex space-x-6 text-white font-semibold" id="nav-links">
        <li><a href="#" id="carrito-link">Carrito</a></li>
        <li><a href="{{ route('tienda.index') }}" id="tiendas-link">Tiendas</a></li>
      </ul>
    </div>
  </nav>

    <!-- Sección de productos -->
    <section id="productos" class="py-12">
        <div class="max-w-7xl mx-auto px-4" id="productos-container">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8" id="productos-title">Nuestros Productos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8" id="productos-grid">
            @forelse ($t->productos as $p)
              @continue(!$p->activo)
              <div class="bg-white shadow-lg rounded-lg overflow-hidden" id="producto-{{ $p->id }}">
                <img src="{{ asset($p->present()->getPhoto()) }}" alt="Producto 1" class="w-full h-64 object-cover" id="producto-image-{{ $p->id }}">
                <div class="p-4" id="producto-details-{{ $p->id }}">
                  <h3 class="text-xl font-semibold text-gray-800" id="producto-name-{{ $p->id }}">{{ $p->nombre }}</h3>
                  <p class="text-gray-600 mt-2" id="producto-description-{{ $p->id }}">{{ $p->descripcion }}</p>
                  <div class="flex justify-between items-center mt-4" id="producto-price-container-{{ $p->id }}">
                    <span class="text-lg font-bold text-gray-800" id="producto-price-{{ $p->id }}">$ {{ $p->getPrecio() }}</span>
                    <a href="{{ route('tienda.producto.show', [$t->dominio, $p->codigo]) }}" class="bg-[var(--color-principal)] text-white px-4 py-2 rounded-lg" id="producto-link-{{ $p->id }}">Ver</a>
                  </div>
                </div>
              </div>
            @empty
              <div class="text-center" id="no-productos">
                <h2>No hay productos disponibles</h2>
              </div>
            @endforelse
          </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8" id="footer">
        <div class="max-w-7xl mx-auto px-4 text-center" id="footer-container">
            <p>&copy; 2025 {{ $t->nombre }}. Todos los derechos reservados.</p>
        </div>
    </footer>

    @if ($t->getInfoJs())
    <script>
      {!! $t->getInfoJs() !!}
    </script>
    @endif
</body>
</html>
