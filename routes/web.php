<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('auth.index');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.showRegistrationForm');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.showLoginForm');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('auth.dashboard');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Работники
    Route::get('/admin/employees', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/employees/createone', [AdminController::class, 'createOne'])->name('admin.createOne');
    Route::get('/admin/employees/createtwo', [AdminController::class, 'createTwo'])->name('admin.createTwo');
    Route::post('/admin/employees', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/employees/{employee}/editOne', [AdminController::class, 'editOne'])->name('admin.editOne');
    Route::get('/admin/employees/{employee}/editTwo', [AdminController::class, 'editTwo'])->name('admin.editTwo');
    Route::put('/admin/employees/{employee}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/employees/{employee}', [AdminController::class, 'delete'])->name('admin.delete');

    // Список отделов
    Route::get('/admin/departments', [DepartmentController::class, 'index'])->name('department.index');

    // Форма создания отдела
    Route::get('/admin/departments/create', [DepartmentController::class, 'create'])->name('department.create');

    // Обработка создания отдела
    Route::post('/admin/departments', [DepartmentController::class, 'store'])->name('department.store');

    // Форма редактирования отдела
    Route::get('/admin/departments/{department}/edit', [DepartmentController::class, 'edit'])->name('department.edit');

    // Обработка редактирования отдела
    Route::put('/admin/departments/{department}', [DepartmentController::class, 'update'])->name('department.update');

    // Удаление отдела
    Route::delete('/admin/departments/{department}', [DepartmentController::class, 'delete'])->name('department.delete');

    Route::get('/admin/professions', [ProfessionController::class, 'index'])->name('profession.index');
    Route::get('/admin/professions/create', [ProfessionController::class, 'create'])->name('profession.create');
    Route::post('/admin/professions', [ProfessionController::class, 'store'])->name('profession.store');
    Route::get('/admin/professions/{profession}/edit', [ProfessionController::class, 'edit'])->name('profession.edit');
    Route::put('/admin/professions/{profession}', [ProfessionController::class, 'update'])->name('profession.update');
    Route::delete('/admin/professions/{profession}', [ProfessionController::class, 'delete'])->name('profession.delete');
});
