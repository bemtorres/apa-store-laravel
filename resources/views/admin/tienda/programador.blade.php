@extends('layouts.app')

@push('css')
<!-- Estilos personalizados para el efecto de código -->
<style>
  .code-editor {
    background-color: #1e1e1e;
    color: #dcdcdc;
    font-family: 'Courier New', monospace;
    font-size: 14px;
    padding: 15px;
    border-radius: 5px;
    border: 1px solid #333;
    width: 100%;
    height: 300px;
    resize: none;
    white-space: pre-wrap; /* Mantiene los saltos de línea */
    word-wrap: break-word; /* Maneja el desbordamiento de texto */
  }

  .code-editor:focus {
    outline: none;
    border-color: #0078d4;
  }

  /* Estilo para las palabras clave CSS y JavaScript */
  .keyword {
    color: #569cd6;
    font-weight: bold;
  }

  .string {
    color: #d69d85;
  }

  .comment {
    color: #6a9955;
    font-style: italic;
  }

  .number {
    color: #b5cea8;
  }

  .operator {
    color: #d4d4d4;
  }
</style>
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
                    <!-- Contenedor para el editor de CSS -->
                    <textarea id="css-editor" name="css" class="code-editor" rows="10">{{ $t->getInfoCssStyles() }}</textarea>
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
                    <textarea id="js-editor" name="js" class="code-editor" rows="10">{{ $t->getInfoJs() }}</textarea>
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
<script>
  // Función para resaltar la sintaxis básica
  function highlightSyntax(editorId) {
    const editor = document.getElementById(editorId);
    const text = editor.value;

    // Expresiones regulares básicas para resaltar CSS y JS
    const cssKeywords = /\b(color|background|font-size|margin|padding|border|width|height)\b/g;
    const jsKeywords = /\b(function|var|let|const|return|if|else|while|for)\b/g;
    const strings = /"[^"]*"|'[^']*'/g;
    const comments = /\/\/.*|\/\*[\s\S]*?\*\//g;
    const numbers = /\b\d+(\.\d+)?\b/g;

    // Reemplazar el texto con los estilos de resaltado
    let highlightedText = text
      .replace(cssKeywords, '<span class="keyword">$&</span>')
      .replace(jsKeywords, '<span class="keyword">$&</span>')
      .replace(strings, '<span class="string">$&</span>')
      .replace(comments, '<span class="comment">$&</span>')
      .replace(numbers, '<span class="number">$&</span>');

    editor.innerHTML = highlightedText;  // Para mostrar el texto resaltado

    // Volver al valor del editor
    editor.value = text;
  }

  // Llamar la función al cargar el contenido del editor
  highlightSyntax('css-editor');
  highlightSyntax('js-editor');
</script>
@endpush
