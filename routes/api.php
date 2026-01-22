<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/produto',[ProdutoController::class, 'store'] );

Route::get('/produto',[ProdutoController::class, 'index'] );

Route::put('/produto/{id}', [ProdutoController::class, 'update']);

Route::delete('/produto/delete/{id}', [ProdutoController::class, 'delete']);