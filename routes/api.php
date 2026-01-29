<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SaidaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/produto',[ProdutoController::class, 'store'] );

Route::get('/produto',[ProdutoController::class, 'index'] );

Route::put('/produto/{id}', [ProdutoController::class, 'update']);

Route::delete('/produto/delete/{id}', [ProdutoController::class, 'delete']);


Route::post('/cliente',[ClienteController::class, 'store'] );

Route::get('/cliente',[ClienteController::class, 'index'] );

Route::put('/cliente/{id}', [ClienteController::class, 'update']);

Route::delete('/cliente/delete/{id}', [ClienteController::class, 'delete']);


Route::post('/entrada',[EntradaController::class, 'store'] );

Route::get('/entrada',[EntradaController::class, 'index'] );

Route::delete('/entrada/delete/{id}', [EntradaController::class, 'delete']);


Route::post('/saida',[SaidaController::class, 'store'] );

Route::get('/saida',[SaidaController::class, 'index'] );

Route::delete('/saida/delete/{id}', [SaidaController::class, 'delete']);