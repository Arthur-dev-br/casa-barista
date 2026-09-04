<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LinhaTempo;

class LinhaTempoController extends Controller
{
    // Listar todos as imagens da galeria cadastradas
    public function index()
    {
        $listaLinhatempo = LinhaTempo::orderByDesc('id_linha_tempo')->get();

        return view('admin.linhatempo.index', compact('listaLinhatempo'));
    }
}