<?php

namespace App\Http\Controllers\Site;

Use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;

class CardapioController extends Controller
{
    public function cardapio(?int $idCategoria = null){
        $listaCategorias = Categoria::where('status_categoria', 'ATIVO')
        ->orderBy('nome_categoria')
        ->get();

        // SE NENHUMA CATEGORIA ESTIVER NA URL, (SE NÃO CLICOU EM NENHUM BOTÃO)
        if($idCategoria == null){
            $categoriaSelecionada = $listaCategorias->first();
        }
        else
        {
            $categoriaSelecionada = $listaCategorias->firstWhere('id_categoria', $idCategoria);

        }


        // caso não tenha a categoria

        abort_if($categoriaSelecionada === null, 404, 'Categoria não encontrada');

        // buscar somente os produtos relacionado a categoria



        $listaProdutos = Produto::where('status_produto', 'ATIVO')
        ->orderBy('nome_produto')
        ->get();

        $produtos = Produto::query()
        ->where('id_categoria', $categoriaSelecionada->id_categoria)
        ->where('status_produto', 'ATIVO')
        ->orderBy('nome_produto')
        ->get();

        

        return view('site.cardapio.cardapio', compact('listaCategorias', 'listaProdutos', 'produtos', 'categoriaSelecionada'));
    }
}