<?php
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TechniqueController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);




Route::resource('services', ServiceController::class);
Route::resource('skills', SkillController::class);
Route::resource('techniques', TechniqueController::class);
Route::resource('projects', ProjectController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
