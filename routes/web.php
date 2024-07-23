<?php

use App\Http\Controllers\SkillController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechniqueController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;


Route::get('/', [WelcomeController::class, 'index']);




Route::resource('services', ServiceController::class);
Route::resource('skills', SkillController::class);
Route::resource('techniques', TechniqueController::class);
Route::resource('projects', ProjectController::class);
