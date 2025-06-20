@extends('layouts.app')

@push('css')
<!-- Incluir los archivos de CodeMirror -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/dracula.min.css">
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
                    <!-- Contenedor para el editor CodeMirror de CSS -->
                    <textarea id="css-editor" name="css" rows="10" class="form-control">{{ $t->getInfoCssStyles() }}</textarea>
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
                    <!-- Contenedor para el editor CodeMirror de JavaScript -->
                    <textarea id="js-editor" name="js" rows="10" class="form-control">{{ $t->getInfoJs() }}</textarea>
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
<!-- Incluir los archivos JS de CodeMirror -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/css/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/javascript/javascript.min.js"></script>
<script>
  // Iniciar el editor CodeMirror para el textarea de CSS
  const cssEditor = CodeMirror.fromTextArea(document.getElementById('css-editor'), {
    lineNumbers: true,
    mode: "css",
    theme: "dracula", // Puedes elegir el tema que prefieras
    lineWrapping: true,
    autoCloseBrackets: true,
    matchBrackets: true
  });

  // Iniciar el editor CodeMirror para el textarea de JavaScript
  const jsEditor = CodeMirror.fromTextArea(document.getElementById('js-editor'), {
    lineNumbers: true,
    mode: "javascript",
    theme: "dracula", // Puedes elegir el tema que prefieras
    lineWrapping: true,
    autoCloseBrackets: true,
    matchBrackets: true
  });
</script>
@endpush
