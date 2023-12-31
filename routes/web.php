<?php

use App\Http\Controllers\GameMatController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/addRole/{role_name}',[RoleController::class,'addRoles']);
Route::get('/addUser/{name}/{email}/{password}/{bookId}',[RoleController::class,'addUsers']);
Route::get('/userId/{id}',[RoleController::class,'getRolesByUser']);
Route::get('/roleId/{id}',[RoleController::class,'getUserByRoles']);

Route::get('/newMatch/{one}/{two}',[GameMatController::class,'newMatch']);
Route::get('/getMatch/{id}',[GameMatController::class,'getMatch']);
Route::get('/getUser1Match/{id}',[GameMatController::class,'getUser1Match']);
Route::get('/getUser2Match/{id}',[GameMatController::class,'getUser2Match']);
Route::get('/getUserMatch/{id}',[GameMatController::class,'getUserMatch']);
