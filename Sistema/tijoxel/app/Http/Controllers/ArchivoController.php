<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);
        //$input = $request->all();
        $file = $request->file('file');
        $nombreArchivo = Str::uuid() . "." . $file->extension();
        $archivoPath = public_path('uploads') . '/' . $nombreArchivo;
        $file->move($archivoPath, $nombreArchivo);
        return response()->json(['imagen' => $nombreArchivo]);
    }
}
