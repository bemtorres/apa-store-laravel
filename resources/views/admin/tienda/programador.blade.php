@extends('layouts.app')

@push('css')
<!-- Estilos opcionales para el editor -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.min.css">
@endpush

@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('body', 'Tienda')
  @endcomponent

  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="block" value="sistema">

            <!-- Editor para CSS -->
            <div class="row mb-3">
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="css-editor">Ingresa tus estilos CSS</label>
                  <div class="col-sm-12">
                    <!-- Contenedor para el editor de CSS -->
                    <div id="css-editor" style="height: 300px;">{{ $t->getInfoCssStyles() }}</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Editor para JS -->
            <div class="row mb-3">
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="js-editor">Ingresa tu código JavaScript</label>
                  <div class="col-sm-12">
                    <!-- Contenedor para el editor de JS -->
                    <div id="js-editor" style="height: 300px;">{{ $t->getInfoJs() }}</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<!-- Incluir Ace Editor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.min.js"></script>
<script>
  // Iniciar el editor de CSS
  var cssEditor = ace.edit("css-editor");
  cssEditor.setTheme("ace/theme/dracula");
  cssEditor.getSession().setMode("ace/mode/css");

  // Iniciar el editor de JavaScript
  var jsEditor = ace.edit("js-editor");
  jsEditor.setTheme("ace/theme/dracula");
  jsEditor.getSession().setMode("ace/mode/javascript");
</script>
@endpush
