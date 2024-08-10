<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReiniciarClaveController extends Controller
{
    public function ChangePass(Request $request)
    {
        //Agregar a lo que viene de $request
        $request->request->add(['username' => Str::slug($request->username),]);

        $validatedData = $request->validate([
            'password' => 'required|confirmed|min:6|max:50',
            #'password_confirmation' => 'required|min:5|max:50',
        ]);
        User::updated([
            'password' => Hash::make($request->password),
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
    public function ResetPass(Request $request)
    {
        //Agregar a lo que viene de $request
        $request->request->add(['username' => Str::slug($request->username),]);

        $validatedData = $request->validate([
            'password' => 'required|confirmed|min:6|max:50',
            #'password_confirmation' => 'required|min:5|max:50',
        ]);
        User::updated([
            'password' => Hash::make($request->password),
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
