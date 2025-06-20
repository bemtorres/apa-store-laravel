@extends('layouts.app')

@push('css')
<!-- Estilos opcionales para Monaco -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.37.0/min/vs/editor/editor.main.min.css">
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
          <form class="form-sample form-submit" action="" method="POST" enctype="multipart/form-data" id="codeForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="block" value="sistema">

            <!-- Editor para CSS -->
            <div class="row mb-3">
              <div class="col-md-12 mb-3">
                <div class="form-group row">
                  <label class="col-sm-12" for="css-editor">Ingresa tus estilos CSS</label>
                  <div class="col-sm-12">
                    <!-- Contenedor para Monaco editor de CSS -->
                    <div id="css-editor" style="height: 300px;"></div>
                    <!-- Input oculto para enviar el contenido del CSS -->
                    <input type="hidden" name="css" id="hidden-css">
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
                    <!-- Contenedor para Monaco editor de JS -->
                    <div id="js-editor" style="height: 300px;"></div>
                    <!-- Input oculto para enviar el contenido de JS -->
                    <input type="hidden" name="js" id="hidden-js">
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group d-flex justify-content-end">
              <button type="submit" class="btn btn-primary" onclick="saveCode()">Guardar</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<!-- Incluir Monaco Editor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.37.0/min/vs/loader.js"></script>
<script>
  require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.37.0/min/vs' }});

  require(['vs/editor/editor.main'], function() {
    // Iniciar el editor de CSS
    var cssEditor = monaco.editor.create(document.getElementById('css-editor'), {
      value: `{{ $t->getInfoCssStyles() }}`,
      language: 'css',
      theme: 'vs-dark',
      automaticLayout: true // Habilita el redimensionamiento automático
    });

    // Iniciar el editor de JavaScript
    var jsEditor = monaco.editor.create(document.getElementById('js-editor'), {
      value: `{{ $t->getInfoJs() }}`,
      language: 'javascript',
      theme: 'vs-dark',
      automaticLayout: true // Habilita el redimensionamiento automático
    });

    // Función para guardar el código en los campos ocultos antes de enviar el formulario
    window.saveCode = function() {
      // Obtener el contenido de los editores
      var cssCode = cssEditor.getValue();
      var jsCode = jsEditor.getValue();

      // Inyectar el contenido en los campos ocultos
      document.getElementById('hidden-css').value = cssCode;
      document.getElementById('hidden-js').value = jsCode;
    };
  });
</script>
@endpush
