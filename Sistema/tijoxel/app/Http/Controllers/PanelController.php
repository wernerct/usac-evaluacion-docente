<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionDocente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        //dd(auth()->user()->id);
        $evaluaciones = EvaluacionDocente::where('user_id', auth()->user()->id)->get(); //$user->id
        //dd($evaluaciones);
        return view('layouts.panel', [
            'user' => auth()->user(), //$user,
            'evaluaciones' => $evaluaciones,
            'esadmin' => auth()->user()->tipousuario
        ]);
    }
}
