<?php

namespace App\Http\Controllers\Site;

Use App\Http\Controllers\Controller;

class EventosController extends Controller
{
    public function eventos(){
        return view('site.eventos.eventos');
    }
}