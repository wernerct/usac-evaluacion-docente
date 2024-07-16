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
        //dd(auth()->user());
        $evaluaciones = EvaluacionDocente::where('user_id', $user->id)->get();
        //dd($evaluaciones);
        return view('layouts.panel', ['user' => $user, 'evaluaciones' => $evaluaciones]);
    }
}
