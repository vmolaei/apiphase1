<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Apicontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("add-employee",[Apicontroller::class,"createEmployee"]);
Route::get("list-employees",[Apicontroller::class,"listEmployees"]);
Route::get("single-employee/{id}",[Apicontroller::class,"getSingleEmployee"]);
Route::put("update-employee/{id}",[Apicontroller::class,"udateEmployee"]);
Route::delete("delete-employee/{id}",[Apicontroller::class, "deleteEmployee"]);
