<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    //
    //este controlador sirve solamente para subida del archivo/evaluacion docente
    //para que se suba el formulario esta en el controlador de SubirEvaluacionController.php
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);
        //$input = $request->all();
        $file = $request->file('file');
        $nombreArchivo = Str::uuid() . "." . $file->extension();
        $archivoPath = public_path('uploads'); // . '/' . $nombreArchivo
        $file->move($archivoPath, $nombreArchivo);
        return response()->json(['archivo' => $nombreArchivo]);
    }
}
