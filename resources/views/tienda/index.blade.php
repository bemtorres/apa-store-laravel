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
            <div class="mb-8 text-center">
              <input type="text" id="buscador" placeholder="Buscar tienda..." class="w-full max-w-md px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#ffb85f]">
            </div>

            <!-- Contenedor dinámico -->
            <div id="contenedor-tiendas" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"></div>
            {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($tiendas as $t)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden group hover:shadow-xl transition-all duration-300">
                    <img src="{{ asset($t->present()->getLogo()) }}" alt="Producto 3" class="w-full h-48 object-cover group-hover:scale-110 transition-all duration-300">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $t->nombre }}</h3>
                        <div class="flex justify-center items-center mt-4">
                            <a href="{{ route('tienda.show',$t->dominio) }}" class="bg-[{{ $t->getColorFondo() }}] w-100 text-white px-2 py-2 rounded-lg text-sm">ir a la tienda</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> --}}
        </div>
    </section>
    <script>
    const tiendas = @json($tiendas->map->to_raw());
    const contenedor = document.getElementById('contenedor-tiendas');
    const buscador = document.getElementById('buscador');

    function renderTiendas(filtro = "") {
        contenedor.innerHTML = "";

        const filtradas = tiendas.filter(t =>
            t.nombre.toLowerCase().includes(filtro.toLowerCase())
        );

        if (filtradas.length === 0) {
            contenedor.innerHTML = `
                <div class="col-span-full text-center text-gray-500">
                    No se encontraron tiendas con ese nombre.
                </div>
            `;
            return;
        }

        filtradas.forEach(t => {
            const tarjeta = document.createElement("div");
            tarjeta.className = "bg-white shadow-lg rounded-lg overflow-hidden group hover:shadow-xl transition-all duration-300";

            tarjeta.innerHTML = `
                <img src="${t.logo_path}" alt="${t.nombre}" class="w-full h-48 object-cover group-hover:scale-110 transition-all duration-300">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">${t.nombre}</h3>
                    <div class="flex justify-center items-center mt-4">
                        <a href="/tienda/${t.dominio}" class="bg-[${t.color}] text-white px-4 py-2 rounded-lg text-sm">ir a la tienda</a>
                    </div>
                </div>
            `;
            contenedor.appendChild(tarjeta);
        });
    }

    buscador.addEventListener('input', (e) => {
        renderTiendas(e.target.value);
    });

    renderTiendas();
</script>

</body>
</html>
