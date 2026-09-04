<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Depoimento;

class DepoimentoController extends Controller
{
    // Listar todos as imagens da Depoimento cadastradas
    public function index()
    {
        $listaDepoimento = Depoimento::orderByDesc('id_depoimento')->get();

        return view('admin.depoimento.index', compact('listaDepoimento'));
    }
}