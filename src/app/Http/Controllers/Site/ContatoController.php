<?php

namespace App\Http\Controllers\Site;

Use App\Http\Controllers\Controller;

class ContatoController extends Controller
{
    public function contato(){
        return view('site.contato.contato');
    }
}