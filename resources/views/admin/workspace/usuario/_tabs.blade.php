<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/workspace/$ws->id/usuarios"]) }}" href="{{ route('admin.workspace.usuarios',$ws->id) }}">Usuarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/workspace/$ws->id/usuarios-add"]) }}" href="{{ route('admin.workspace.usuarios.add',$ws->id) }}">Añadir usuarios</a>
  </li>
</ul>
