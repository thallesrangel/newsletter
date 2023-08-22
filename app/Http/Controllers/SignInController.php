<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class signInController extends Controller
{
    public function index()
    {
        return view('public.signIn');
    }

    public function validation(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'max:255']
        ],
        [
            'required'  => 'Campo obrigatório.'
        ]);

        $user = Users::where('email', $request->email)->first();
        
        if (isset($user) && password_verify($request->password, $user->password)) {
            session()->put('user', $user);

            return redirect()->route('dashboard');
        } else {
            return redirect()->route('signIn')->with('warning', 'E-mail ou senha incorreto');
        };
    }
}
