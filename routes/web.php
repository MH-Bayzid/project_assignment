<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
// Profile
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/logout',[ProfileController::class, 'logout'])->name('logout');


// Users
Route::get('/user/list',[UserController::class, 'user_list'])->name('users');
Route::get('/user/delete{user_id}',[UserController::class, 'user_delete'])->name('user.delete');

// Company
Route::get('/company/list',[CompanyController::class, 'companies'])->name('companies');
Route::post('/add/company',[CompanyController::class, 'company_store'])->name('company.store');
Route::get('/company/edit{company_id}',[CompanyController::class, 'edit_company'])->name('edit.company');
Route::get('/company/delete{company_id}',[CompanyController::class, 'delete_company'])->name('delete.company');
Route::post('/company/update',[CompanyController::class, 'company_update'])->name('company.update');

// Employee
Route::get('/Employee/list',[EmployeeController::class, 'employee'])->name('employee');
Route::post('/Employee/store',[EmployeeController::class, 'employee_store'])->name('employee.store');
Route::get('/Employee/edit/{employee_id}',[EmployeeController::class, 'edit_employee'])->name('edit.employee');
Route::get('/Employee/delete/{employee_id}',[EmployeeController::class, 'delete_employee'])->name('delete.employee');
Route::post('/Employee/update',[EmployeeController::class, 'employee_update'])->name('employee.update');

