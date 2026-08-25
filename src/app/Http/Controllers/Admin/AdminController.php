<?php

namespace App\Http\Controllers\Admin;

Use App\Http\Controllers\Controller;

use App\Models\Cliente;
use App\Models\Produto;

use App\Models\Venda;

// dash metodo para carregar a index (dash)
class AdminController extends Controller
{
    public function dashboard(){

        // quantidade total de clientes ativos
        $qtdeClientes = Cliente::where('status_cliente', 'ATIVO')->count();
        // quantidade total de produtos ativos
        $qtdeProdutos = Produto::where ('status_produto', 'ATIVO')->count();
        // quantidade total de produtos em destaque
        $qtdeProdutosDestaque = Produto::where ('destaque_produto', 1)->count();
        //valor total de vendas
        $valorTotalVendas = Venda::where ('status_venda', 'FINALIZADA')->sum('valor_total_venda');

     
        return view('admin.dashboard', compact('qtdeClientes','qtdeProdutos','qtdeProdutosDestaque', 'valorTotalVendas' ));
    }
}