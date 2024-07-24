<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SkillController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TechniqueController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserRolePermissionController;

//Middlewares
use App\Http\Middleware\CheckRole;
 

Route::get('/', [WelcomeController::class, 'index']);




Route::resource('services', ServiceController::class);
Route::resource('skills', SkillController::class);
Route::resource('techniques', TechniqueController::class);
Route::resource('projects', ProjectController::class);



    // Roles
    Route::resource('roles', RoleController::class);

    // Permissions
    Route::resource('permissions', PermissionController::class);
    
    Route::get('/assign-role', [UserRolePermissionController::class, 'showAssignRoleForm'])->name('assign.role');
    Route::post('/assign-role', [UserRolePermissionController::class, 'assignRole'])->name('assign.role');
    Route::get('/permission-table', [UserRolePermissionController::class, 'usersRolesPermissions'])->name('user.rolepermissions');
    Route::get('/assign-permission', [UserRolePermissionController::class, 'showAssignPermissionForm'])->name('assign.permission');
    Route::post('/assign-permission', [UserRolePermissionController::class, 'assignPermission'])->name('assign.permission');
    
    Route::get('/user/{userId}/remove-role', [UserRolePermissionController::class, 'removeRole'])->name('remove.role');
    Route::get('/role/{roleId}/remove-permission', [UserRolePermissionController::class, 'removePermission'])->name('remove.permission');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
