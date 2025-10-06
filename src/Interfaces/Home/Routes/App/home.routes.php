<?php


use Src\Interfaces\Home\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
