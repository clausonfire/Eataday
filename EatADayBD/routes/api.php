<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ingredientController;
use App\Http\Controllers\UserController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});*/


Route::prefix('/recipes')->group(function() {
    Route::get('', [RecipeController::class, 'getAllRecipes']);
    Route::get('/{id}', [RecipeController::class, 'getIdRecipe']);
    Route::post('', [RecipeController::class, 'createRecipe']);
    Route::delete('/{id}', [RecipeController::class, 'deleteRecipe']);
    Route::patch('/{id}', [RecipeController::class, 'modifyRecipe']);
});


Route::get('/ingredient', [ingredientController::class, 'index']);
Route::get('/ingredient/{id}', [ingredientController::class, 'show']);
Route::post('/ingredient', [ingredientController::class, 'store']);
Route::patch('/ingredient/{id}', [ingredientController::class, 'update']);
Route::delete('/ingredient/{id}', [ingredientController::class, 'delete']);


Route::get('/user', [UserController::class, 'getAll']);
Route::get('/user/{id}', [UserController::class, 'getById']);
Route::post('/user', [UserController::class, 'create']);
Route::delete('/user/{id}', [UserController::class, 'delete']);
Route::patch('/user/{id}', [UserController::class, 'modify']);
