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
    public function index() //User $user
    {
        //dd(auth()->user());
        $catedraticos = User::where('tipousuario', 1)->get();
        return view('layouts.subirevaluacion', ['catedraticos' => $catedraticos]);
    }
    public function store(Request $request)
    {
        //dd('Mostrando request' . $request);
        $validatedData = $request->validate([
            'descripcion' => 'required|max:255',
            'archivo' => 'required',
            'codigocatedratico' => 'required',
            'estado' => 'required'
        ]);
        EvaluacionDocente::create([
            'descripcion' => $request->descripcion,
            'archivo' => $request->archivo,
            'user_id' => $request->codigocatedratico, // auth()->user()->id
            'estado' => $request->estado
        ]);
        /*//otra forma de almacenar
        $evaluacion = new EvaluacionDocente;
        $evaluacion->descripcion = $request->descripcion;
        $evaluacion->archivo = $request->archivo;
        $evaluacion->codigocatedratico = $request->codigocatedratico; // auth()->user()->id
        $evaluacion->estado = $request->estado;
        $evaluacion->save();*/

        /* // tercera forma de almacenar, pero ya deben tener la relaciones de llaves foraneas en los modelos
        $request->user()->evaluaciondocente()->create([
            'descripcion' => $request->descripcion,
            'archivo' => $request->archivo,
            'user_id' => $request->codigocatedratico, // auth()->user()->id
            'estado' => $request->estado
        ]);
        */
        return redirect()->route('panel', auth()->user()->username);
    }
}
