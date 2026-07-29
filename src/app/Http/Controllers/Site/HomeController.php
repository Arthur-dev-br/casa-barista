<?php

namespace App\Http\Controllers\Site;

Use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Depoimento;
use App\Models\Galeria;

class HomeController extends Controller
{
    public function home(){


        // busque a lista de banner para exibir na home (views)
       $listaBanner = Banner::where('status_banner', 'ATIVO')->inRandomOrder()-> get();

       //dd($listaBanner);

       // Buscar os depoimentos aprovado junto com os dados dos clientes

       $listaDepo = Depoimento::with('DepoimentoCliente')
       ->where('status_depoimento', 'APROVADO')
       ->orderByDesc('id_depoimento')
       ->get();
       //dd ($listaDepo->toArray());

       $listaGaleria = Galeria::where('status_galeria', 'ATIVO')->get();

       
     
        return view('site.home.home', compact('listaBanner', 'listaDepo', 'listaGaleria'));
    }
}