<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

//auth rotas
route::get('/login', [AuthController::class,'login']);
route::get('/logout', [AuthController::class,'logout']);
    
?>