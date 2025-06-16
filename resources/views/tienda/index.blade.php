<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online Moderna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Barra de navegación -->
    <nav class="bg-[#ffb85f] text-white p-4 shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="#" class="font-bold text-2xl">Tienda Online</a>
            <ul class="flex space-x-6">
                <li><a href="{{ route('tienda.index') }}" class="hover:text-blue-400">Tiendas</a></li>
                <li><a href="{{ route('root') }}" class="hover:text-blue-400">Acceder</a></li>
                <li><a href="{{ route('root.registrar') }}" class="hover:text-blue-400">Registro</a></li>
            </ul>
        </div>
    </nav>

    <!-- Sección de productos -->
    <section id="productos" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Nuestras tiendas</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                @foreach ($tiendas as $t)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden group hover:shadow-xl transition-all duration-300">
                    <img src="{{ asset($t->present()->getLogo()) }}" alt="Producto 3" class="w-full h-48 object-cover group-hover:scale-110 transition-all duration-300">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $t->nombre }}</h3>
                        {{-- <p class="text-gray-600 mt-2">{{ $t->descripcion }}</p> --}}
                        <div class="flex justify-center items-center mt-4">
                            {{-- <span class="text-lg font-bold text-gray-800">$50.00</span> --}}
                            {{-- {{ $t->getColorTexto() }} --}}
                            {{-- {{ $t->getColorFondo() }} --}}
                            <a href="{{ route('tienda.show',$t->dominio) }}" class="bg-[{{ $t->getColorFondo() }}] w-100 text-white px-2 py-2 rounded-lg text-sm">ir a la tienda</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</body>
</html>
