<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        //Agregar a lo que viene de $request
        $request->request->add(['username' => Str::slug($request->username),]);

        $validatedData = $request->validate([
            'name' => 'required|min:5|max:50',
            'username' => 'required|unique:users|min:5|max:50',
            'email' => 'required|unique:users|email|min:5|max:50',
            'password' => 'required|confirmed|min:6|max:50',
            #'password_confirmation' => 'required|min:5|max:50',
            'codigocatedratico' => 'required|unique:users|min:6|max:255',
            #'tipousuario' => 'nullable|string|max:255',
            #'carrera' => 'nullable|string|max:255',
            #'sede' => 'nullable|string|max:255',
        ]);
        //return view('auth.registrer');
        User::create([
            'name' => $request->name,
            'username' => $request->username, #Str::slug($request->username),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'codigocatedratico' => $request->codigocatedratico,
            'tipousuario' => 2, //tipo usuario 1 igual a administrador tipo usuario 2 es catedratico
            'carrera' => 1,
            'sede' => 1,
        ]);
        //Autenticar usuario
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        //otra forma de autenticar
        //auth()->attempt($request->only('email', 'password'));

        return redirect()->route('panel');
    }
}
