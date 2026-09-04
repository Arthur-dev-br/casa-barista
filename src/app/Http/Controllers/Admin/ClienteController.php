<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // Listar todos as imagens da galeria cadastradas
    public function index()
    {
        $listaCliente= Cliente::orderByDesc('id_cliente')->get();

        return view('admin.cliente.index', compact('listaCliente'));
    }
}