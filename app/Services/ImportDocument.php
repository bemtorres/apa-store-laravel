<?php
// Content open source BENJAMIN MORA TORRES
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ImportDocument
{
  public static function save(
    Request $request,
    $inputName = 'file',
    $name = '',
    $folderSave = 'private/trash',
    $validate = false,
    $allowedTypes = ['pdf', 'xls', 'xlsx', 'csv', 'txt', 'doc', 'docx']
  ) {
    try {
      if ($validate) {
        $request->validate([
          $inputName => [
            'required',
            'file',
            'max:20480', // Máximo 20MB
            'mimes:' . implode(',', $allowedTypes)
          ],
        ]);
      }

      $file = $request->file($inputName);

      if (!$file) {
        return response()->json(['error' => 'Archivo no encontrado en el input.'], 422);
      }

      $extension = $file->getClientOriginalExtension();
      $filename = $name ? "$name.$extension" : $file->getClientOriginalName();
      $filePath = $file->storeAs($folderSave, $filename);
      return $filePath;
    } catch (ValidationException $e) {
      return response()->json([
        'error' => 'El archivo debe ser un tipo válido (' . implode(', ', $allowedTypes) . ') y no exceder 20 MB.'
      ], 422);
    } catch (\Throwable $th) {
      return response()->json(['error' => 'Error al guardar el archivo.'], 500);
    }
  }
}
