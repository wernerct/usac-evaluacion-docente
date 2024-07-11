<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        #if(auth()->attempt(['email' => $email, 'password' => $password])))
        if (!auth()->attempt($request->only(['email', 'password']))) {
            return back()->with('Mensaje', 'Credenciales Incorrectas');
        }
        return redirect()->route('panel');
    }
}
