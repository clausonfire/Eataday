<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use App\Models\UserFavouriteRecipes;
use Illuminate\Http\Request;

class UserFavouriteRecipesController extends Controller
{
    public function getById(Request $request, $idUser, $idRecipe)
    {
        $user = User::find($idUser);
        $recipe = Recipe::find( $idRecipe);
        if ($user && $recipe) {
            $userFavouriteRecipes = UserFavouriteRecipes::where('user_id', $user->id)
                ->where('recipe_id', $recipe->id)
                ->get();
            if ($userFavouriteRecipes ) {
                $response = [
                    'success' => true,
                    'message' => 'Favourite recipes found successfully',
                    'data' => $userFavouriteRecipes
                ];
                return response()->json($response);
            }
            $response = [
                'success' => false,
                'message' => 'Favourite recipes not found',
                'data' => null
            ];
            return response()->json($response, 404);
        }
        $response = [
            'success' => false,
            'message' => 'User not found',
            'data' => null
        ];

        return response()->json($response, 404);
    }
}
