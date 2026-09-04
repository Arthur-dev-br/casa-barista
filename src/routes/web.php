<?php

use App\Http\Controllers\Site\CardapioController;
use App\Http\Controllers\Site\ContatoController;
use App\Http\Controllers\Site\EventosController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SobreController;


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\GaleriaController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\DepoimentoController;
use App\Http\Controllers\Admin\LinhaTempoController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/sobre', [SobreController::class, 'sobre'])->name('sobre');

Route::get('/cardapio', [CardapioController::class, 'cardapio'])->name('cardapio');
Route::get('/cardapio/categoria/{idCategoria}', [CardapioController::class, 'cardapio'])->name('cardapio.categoria');



Route::get('/evento', [EventosController::class, 'evento'])->name('evento');
Route::get('/contato', [ContatoController::class, 'contato'])->name('contato');

//Estrutura para a área administrativa
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/admin/banners', [BannerController::class, 'index'])->name('admin.banner.index');
Route::get('/admin/galeria', [GaleriaController::class, 'index'])->name('admin.galeria.index');
Route::get('/admin/categoria',[CategoriaController::class, 'index'])->name('admin.categoria.index');
Route::get('/admin/cliente',[ClienteController::class, 'index'])->name('admin.cliente.index');
Route::get('/admin/depoimento',[DepoimentoController::class, 'index'])->name('admin.depoimento.index');
Route::get('/admin/linhatempo',[LinhaTempoController::class, 'index'])->name('admin.linhatempo.index');
