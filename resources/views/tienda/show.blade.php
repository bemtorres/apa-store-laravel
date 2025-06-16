<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Puedes cambiar el color de la tienda aquí */
        /* bg-[{{ $t->getColorFondo() }}] w-100 text-[{{ $t->getColorTexto() }}] */
        :root {
            --color-principal: {{ $t->getColorFondo() }}; /* Cambia este color para personalizar la tienda */
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Barra de navegación -->
    <nav class="bg-[var(--color-principal)] p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <!-- Logo de la tienda -->
            <div>
              <img src="{{ asset($t->present()->getLogo()) }}" alt="Logo" class="h-10">
              {{ $t->nombre }}
            </div>
            <ul class="flex space-x-6 text-white font-semibold">
                <li><a href="#">Carrito</a></li>
                <li><a href="{{ route('tienda.index') }}">Tiendas</a></li>
                {{-- <li><a href="#contacto">Contacto</a></li> --}}
            </ul>
        </div>
    </nav>

    <!-- Sección de productos -->
    <section id="productos" class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Nuestros Productos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse ($t->productos as $p)
              <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ asset($p->present()->getPhoto()) }}" alt="Producto 1" class="w-full h-64 object-cover">
                <div class="p-4">
                  <h3 class="text-xl font-semibold text-gray-800">{{ $p->nombre }}</h3>
                  <p class="text-gray-600 mt-2">{{ $p->descripcion }}</p>
                  <div class="flex justify-between items-center mt-4">
                    <span class="text-lg font-bold text-gray-800">$ {{ $p->getPrecio() }}</span>
                    <button class="bg-[var(--color-principal)] text-white px-4 py-2 rounded-lg">Agregar al carrito</button>
                  </div>
                </div>
              </div>
            @empty
              <div class="text-center">
                <h2>No hay productos disponibles</h2>
              </div>
            @endforelse
          </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2025 {{ $t->nombre }}. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>
