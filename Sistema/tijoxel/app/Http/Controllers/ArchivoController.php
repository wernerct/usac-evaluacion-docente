<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    //
    public function store(Request $request)
    {
        //$input = $request->all();
        $evaluacion = $request->file('file');
        $nombreArchivo = Str::uuid() . "." . $evaluacion->extension();
        $archivoPath = public_path('uploads') . '/' . $nombreArchivo;
        $evaluacion->move($archivoPath, $nombreArchivo);
        return response()->json(['imagen' => $nombreArchivo]);
    }
}
