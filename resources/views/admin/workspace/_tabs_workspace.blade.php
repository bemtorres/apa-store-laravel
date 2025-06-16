<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/workspace/" . $ws->id]) }}" href="{{ route('usuarios.show',$ws->id) }}">{{ $ws->nombre }}</a>
  </li>

  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/workspace/" . $ws->id . '/edit']) }}" href="{{ route('admin.workspace.edit',$ws->id) }}">Editar</a>
  </li>
  <li class="nav-item">
    {{-- <a class="nav-link {{ activeTab(["admin/usuario/" . $u->id . '/historial']) }}" href="{{ route('usuario.historial',$u->id) }}">Historial</a> --}}
  </li>
</ul>






