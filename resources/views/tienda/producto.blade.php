<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tienda Online</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --color-principal: {{ $t->getColorFondo() }};
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

  <!-- Navbar -->
  <nav class="bg-[var(--color-principal)] p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <div class="flex items-center space-x-3">
        <img src="{{ asset($t->present()->getLogo()) }}" alt="Logo" class="h-10">
        <span class="text-white text-xl font-bold">{{ $t->nombre }}</span>
      </div>
      <ul class="flex space-x-6 text-white font-semibold">
        <li><a href="#">Carrito</a></li>
        <li><a href="{{ route('tienda.index') }}">Tiendas</a></li>
      </ul>
    </div>
  </nav>

  <!-- Producto -->
  <main class="flex-grow py-12">
    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl grid md:grid-cols-2 gap-6 p-6">

      <!-- Imagen del producto -->
      <div class="rounded-lg overflow-hidden">
        <img src="{{ asset($p->present()->getPhoto()) }}" alt="{{ $p->nombre }}" class="w-full h-auto object-cover">
      </div>

      <!-- Detalles + QR -->
      <div class="flex flex-col justify-between">
        <div>
          <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $p->nombre }}</h1>
          <p class="text-gray-600 text-lg mb-6">{{ $p->descripcion }}</p>

          <div class="flex items-center justify-between mb-6">
            <span class="text-3xl font-extrabold text-gray-900">$ {{ $p->getPrecio() }}</span>
            <button class="bg-[var(--color-principal)] text-white px-6 py-2 rounded-lg font-medium hover:shadow-md transition">
              Agregar al carrito
            </button>
          </div>
        </div>

        <!-- Código QR -->
        <div class="bg-gray-100 border rounded-lg p-4 flex flex-col items-center">
          <div id="qrcode" class="mb-2"></div>
          <p class="text-gray-700 text-sm">Escanea con tu aplicación</p>
        </div>
      </div>
    </div>

    <!-- Botón de volver -->
    <div class="mt-8 text-center">
      <a href="{{ route('tienda.show', $t->dominio) }}" class="inline-block bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
        ← Volver a la lista de productos
      </a>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-6">
    <div class="text-center text-sm">
      &copy; 2025 {{ $t->nombre }}. Todos los derechos reservados.
    </div>
  </footer>

  <!-- QRCode.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
  <script>
    new QRCode(document.getElementById("qrcode"), {
      text: "{{ $p->codigo }}", // Código o URL del producto
      width: 100,
      height: 100,
      colorDark : "#000000",
      colorLight : "#ffffff",
      correctLevel : QRCode.CorrectLevel.H
    });
  </script>

</body>
</html>
