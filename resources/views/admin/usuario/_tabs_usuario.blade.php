<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/usuarios/" . $u->id]) }}" href="{{ route('usuarios.show',$u->id) }}">{{ $u->nombre_completo() }}</a>
  </li>
  {{-- <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/usuarios/" . $u->id . '/sedes']) }}" href="{{ route('usuarios.sedes',$u->id) }}">Sedes</a>
  </li> --}}
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/usuarios/" . $u->id . '/edit']) }}" href="{{ route('usuarios.edit',$u->id) }}">Editar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/usuarios/" . $u->id . '/workspaces']) }}" href="{{ route('usuarios.workspaces',$u->id) }}">Espacios de trabajos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/usuarios/" . $u->id . '/sedes']) }}" href="{{ route('usuarios.sedes',$u->id) }}">Asociar sedes</a>
  </li>

  @if(current_user()->super_admin)
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/logger/usuario/" . $u->id]) }}" href="{{ route('logger.usuario.show',$u->id) }}">Log registro</a>
  </li>
  @endif
</ul>
