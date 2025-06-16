<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/workspace/" . $ws->id . "/articulos"]) }}" href="{{ route('admin.workspace.articulos', $ws->id) }}">Workspaces</a>
  </li>
  {{-- <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/workspace/" . $ws->id . "/articulos/create"]) }}" href="{{ route('admin.workspace.index') }}">Workspaces</a>

  </li> --}}
  {{-- <li class="nav-item"> --}}
    {{-- <a class="nav-link {{ activeTab(["admin/usuario/admins"]) }}" href="{{ route('admin.usuario.admin') }}">Admins</a> --}}
  {{-- </li> --}}
  {{-- <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/usuario/eliminados"]) }}" href="#">Eliminados</a>
  </li> --}}
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/workspace/" . $ws->id . "/articulos/create"]) }}" href="{{ route('admin.workspace.articulos.create', $ws->id) }}">Nuevo</a>
  </li>
</ul>
