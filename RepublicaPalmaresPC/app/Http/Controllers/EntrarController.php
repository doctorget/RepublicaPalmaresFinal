<?php


namespace App\Http\Controllers;


use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class EntrarController extends Controller
{
    
    public function index()
    {
        return view('Palmares.login');
    }

    public function entrar(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()
                ->back()
                ->withErrors('Usuário e/ou senha incorretos');
        }

        return redirect()->route('home');

    }
}
