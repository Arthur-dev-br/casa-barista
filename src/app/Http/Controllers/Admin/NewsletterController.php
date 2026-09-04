<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    // Listar todos as imagens da galeria cadastradas
    public function index()
    {
        $listaNews = Newsletter::orderByDesc('id_news')->get();

        return view('admin.newsletter.index', compact('listaNews'));
    }
}