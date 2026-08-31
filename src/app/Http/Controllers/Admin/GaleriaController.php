<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;

class GaleriaController extends Controller
{
    // Listar todos os banners cadastrados
    public function index()
    {
        $listaGaleria = Galeria::orderByDesc('id_galeria')->get();

        return view('admin.galeria.index', compact('listaGaleria'));
    }
}