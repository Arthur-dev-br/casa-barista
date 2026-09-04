<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    // Listar todos as imagens da galeria cadastradas
    public function index()
    {
        $listaCategoria = Categoria::orderByDesc('id_categoria')->get();

        return view('admin.categoria.index', compact('listaCategoria'));
    }
}