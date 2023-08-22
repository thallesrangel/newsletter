<?php

namespace App\Http\Controllers;

class SignOutController extends Controller
{
    public function index() 
    {
        session()->flush();

        return redirect()->route('signIn')->with('success', 'Deslogado com sucesso');
    }
}