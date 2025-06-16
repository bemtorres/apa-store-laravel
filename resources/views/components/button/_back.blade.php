<div class="col-12 mb-3">
  <div class="row mb-12 d-flex justify-content-between">
    <div class="col-sm-12 col-md-8">
      <h5 class="card-title">
        @if (!empty($route))
        <a href="{{ $route }}" class="text-{{ $color ?? 'dark' }} align-middle me-2">
          <i class="fas fa-arrow-circle-left"></i>
        </a>
        @endif
        @if (!empty($icon))
        <i class="{{ $icon ?? '' }}"></i>
        @endif
        {!! $body ?? '' !!}
      </h5>
    </div>

    @if (!empty($historial))
    <div class="col-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          @foreach ($historial as $key => $value)
          <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
            @if ($loop->last)
                {{ $value[1] }}
            @else
                <a href="{{ $value[0] }}">{{ $value[1] }}</a>
            @endif
          </li>
        @endforeach
        </ol>
      </nav>
    </div>
    @endif
  </div>
</div>


