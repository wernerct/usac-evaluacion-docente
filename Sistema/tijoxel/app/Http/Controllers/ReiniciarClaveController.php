<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReiniciarClaveController extends Controller
{
    public function index()
    {
        return view('auth.changepassword');
    }

    public function ChangePass(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);
        $validatedData = $request->validate([
            'password' => 'required|confirmed|min:6|max:50',
        ]);
        $user = auth()->user();
        $user->update([
            'password' => Hash::make($request->password),
        ]);
        auth()->logout();
        return redirect()->route('login');
        /*
        if (!auth()->attempt($request->only(['email', 'password']))) {
            return back()->with('Mensaje', 'Credenciales Incorrectas');
        }else{

            return redirect()->route('panel', [
                'user' => auth()->user()->username
            ]);
        }*/
    }
    public function ResetPass(Request $request)
    {
        //dd($request->QCatedratico);
        $item = User::find($request->QCatedratico);

        if ($item) {
            $item->password = Hash::make('Cunt0t0');
            $item->save();
            return redirect()->route('panel')->with('success', 'Contraseña restablecida correctamente');
        } else {
            return redirect()->route('panel')->with('error', 'Usuario no encontrado');
        }
    }
}
