<?php

namespace App\Http\Controllers\Site;

Use App\Http\Controllers\Controller;

class CardapioController extends Controller
{
    public function cardapio(){
        return view('site.cardapio.cardapio');
    }
}