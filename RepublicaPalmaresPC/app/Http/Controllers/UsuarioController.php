<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('usuario.usuario');
    }

    public function listarUsuarios()
    {
        return view('usuario.usuarioLista');
    }
}