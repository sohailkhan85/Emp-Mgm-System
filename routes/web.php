<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmpController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout1');
Route::post('/login', [LoginController::class, 'login_action'])->name('login_action');
Route::get('/emp-signup', [LoginController::class, 'emp_signup'])->name('emp.signup');
Route::post('/emp-signup_action', [LoginController::class, 'emp_signup_action'])->name('emp_signup_action');
Route::get('/emp_view',[EmpController::class, 'emp_view'])->name('emp.view')->middleware('LoginCheck');
Route::get('/depts_view',[EmpController::class, 'depts_view'])->name('depts.view');
Route::get('/emp_create',[EmpController::class, 'emp_create'])->name('emp.create');
Route::post('/emp_create',[EmpController::class, 'emp_create_post'])->name('emp.create.post');
Route::get('/trash_view',[EmpController::class, 'trash_view'])->name('trash.view');
Route::get('/singemp_view/{id}',[EmpController::class, 'singemp_view'])->name('singemp.view');
Route::get('/emp_delete/{id}',[EmpController::class, 'emp_delete'])->name('emp.delete');
Route::get('/emp_edit/{id}',[EmpController::class, 'emp_edit'])->name('emp.edit');
Route::post('/emp_update/{id}',[EmpController::class, 'emp_update'])->name('emp.update');
Route::get('/emp_permdelete/{id}',[EmpController::class, 'emp_permdelete'])->name('permemp.delete');
Route::get('/emp_restore/{id}',[EmpController::class, 'emp_restore'])->name('emp.restore');


