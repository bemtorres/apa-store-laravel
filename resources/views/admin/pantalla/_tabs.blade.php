<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/pantalla"]) }}" href="{{ route('admin.pantalla.index') }}">Pantallas</a>
  </li>
  {{-- <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/workspace-me"]) }}" href="{{ route('admin.workspace.index.me') }}">Mis workspaces</a>
  </li> --}}
  {{-- <li class="nav-item"> --}}
    {{-- <a class="nav-link {{ activeTab(["admin/usuario/admins"]) }}" href="{{ route('admin.usuario.admin') }}">Admins</a> --}}
  {{-- </li> --}}
  {{-- <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/usuario/eliminados"]) }}" href="#">Eliminados</a>
  </li> --}}
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.pantalla.create') }}">Nuevo</a>
  </li>
</ul>
