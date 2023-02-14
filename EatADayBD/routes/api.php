<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SupermarketsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LoginController;

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

//LOGIN
Route::post('/login', [LoginController::class, 'logIn']);
Route::post('/signup', [LoginController::class, 'signUp']);

Route::group(['middleware' => 'auth:api'],
    function () {
        Route::post('/logout', [LoginController::class, 'logOut']);
        Route::get('/soyyo', [LoginController::class, 'userInfo']);
    }
);

//USER
Route::prefix('/users')->group(function () {
    Route::controller(UserController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '',
                'create'
            );

            Route::middleware('isLoggedIn')->delete(
                '/{id}',
                'delete'
            );
            Route::middleware('isLoggedIn')->get('/{id}/recipes', 'recipes');

        }
    );
});

//RECIPES
Route::prefix('/recipes')->group(function () {
    Route::controller(RecipeController::class)->group(
        function () {
            Route::get('', 'getAll');
            Route::get('/{id}', 'getById');
            Route::get('', 'getId');
            Route::get('/{id}', 'delete');
            Route::get('/{id}', 'update');
            Route::get('/{id}/ingredient', 'ingredient');
            Route::get('/{id}/user', 'users');
        }
    );
});

//COMMENTS
Route::prefix('/comments')->group(function () {
    Route::controller(CommentController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '',
                'create'
            );

            Route::delete(
                '/{id}',
                'delete'
            );

        }
    );
});
//ROLES
Route::prefix('/roles')->group(function () {
    Route::controller(RoleController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '',
                'create'
            );

            Route::delete(
                '/{id}',
                'delete'
            );

        }
    );
});

//INGREDIENTS
Route::prefix('/ingredients')->group(function () {
    Route::controller(IngredientController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '',
                'create'
            );
            Route::patch(
                '/{id}',
                'update'
            );

            Route::delete(
                '/{id}',
                'delete'
            );
            Route::get(
                '/{id}/user',
                'user'
            );
            Route::get('/{id}/recipes', 'recipes');
            Route::get('/{id}/supermarket', 'supermarket');
        }
    );
});


Route::prefix('/comments')->group(function () {
    Route::controller(IngredientController::class)->group(
        function () {
            Route::get(
                '',
                'getAll',
            );
            Route::get(
                '/{id}',
                'getById'
            );
            Route::post(
                '',
                'create'
            );
            Route::patch(
                '/{id}',
                'update'
            );

            Route::delete(
                '/{id}',
                'delete'
            );
            Route::get(
                '/{id}/user',
                'user'
            );
        }
    );
});
Route::prefix('/supermarket')->group(function () {
    Route::controller(SupermarketController::class)->group(
        function () {
            Route::get(
                '',
                [SupermarketController::class, 'getAll']
            );

            Route::get(
                '/{id}',
                [SupermarketController::class, 'getById']
            );
            Route::post(
                '',
                [SupermarketController::class, 'create']
            );
            Route::patch(
                '/{id}',
                [SupermarketController::class, 'modify']
            );

            Route::delete(
                '/{id}',
                [SupermarketController::class, 'delete']
            );
            Route::get('/{id}/ingredient', 'ingredient');
        }
    );
});
