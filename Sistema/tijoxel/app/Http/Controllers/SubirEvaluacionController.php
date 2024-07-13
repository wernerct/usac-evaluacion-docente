<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionDocente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SubirEvaluacionController extends Controller
{
    //
    //este controlador sirve como el formulario que recibe los datos para ser guardados en la tabla
    //el procedimiento solo de subida del archivo/evaluaciondoncente se realiza en ArchivoController.php

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user)
    {
        //dd(auth()->user());
        return view('layouts.subirevaluacion');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:255',
            'archivo' => 'required',
            'user_id' => 'required',
        ]);
        EvaluacionDocente::create([
            'descripcion' => $request->descripcion,
            'archivo' => $request->archivo,
            'user_id' => $request->user_id, // auth()->user()->id
            'estado' => 1,
        ]);
        return redirect()->route('panel', auth()->user()->username);
    }
}
