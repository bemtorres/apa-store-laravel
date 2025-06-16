{{-- @php
  $class = "";

  if (current_user()->tipo_general == "bodega") {
    $class = "sidebar-dark";
  }
@endphp --}}
@php
$collapse = current_user()->getInfogSiderCollapse() ? 'hide' : '';
@endphp

<div class="sidebar sidebar-dark sidebar-fixed text-sm {{ $collapse }}" id="sidebar">
  <div class="sidebar-brand d-none d-md-flex">
    {{-- <p>Control de prestamos</p> --}}
    <img src="{{ asset(current_tienda()->present()->getLogo()) }}" class="m-3" width="80" alt="">
    {{-- <img src="{{ asset('PRESTAMOS-DUOC.svg') }}" class="m-3" width="80" alt=""> --}}
  </div>
  <ul class="sidebar-nav {{ activeTab(["asignaturas*"]) }}" data-coreui="navigation" data-simplebar="">
    <li class="nav-item">
      <a class="nav-link rounded-pill mx-3 mb-1 mt-2" href="{{ route('home.index') }}">
        <i class="nav-icon fa-solid fa-house-chimney"></i>
        Inicio
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab(['/']) }} rounded-pill mx-3" href="{{ route('admin.producto.index') }}">
        <i class="nav-icon fa-solid fa-list-alt"></i>
        Productos
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab(['/']) }} rounded-pill mx-3" href="">
        <i class="nav-icon fa-solid fa-list-alt"></i>
        Tienda
      </a>
    </li>
    {{-- <li class="nav-title">Configuración</li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab(['/']) }} rounded-pill mx-3" href="">
        <i class="nav-icon fa-solid fa-list-alt"></i>
        Fichas
      </a>
    </li> --}}
  </ul>
</div>
