<?php

namespace App\Http\Controllers;

use App\Models\ingredient;
use Illuminate\Http\Request;
use Throwable;


class IngredientController extends Controller
{
    public function getAllIngredients(Request $request)
    {
        try {
            $ingredient = ingredient::all();
        } catch (Throwable $e) {
            return response('Any ingredient found', 200);
        }

        $response = [];

        if (isset($ingredient[0])) {
            $response = [
                'success' => true,
                'message' => "Ingredients fetched successfully",
                'data' => $ingredient
            ];

            return response()->json($response, 200);
        } else {

            $response = [
                'success' => false,
                'message' => "No Ingredients found",
                'data' => null
            ];
            return response()->json($response, 200);
        }

    }
    public function createIngredient(Request $request)
    {
        $id = null;
        try {
            $id = ingredient::insertGetId($request->validate([
                'ingredient' => 'required|string|unique:ingredients'
            ]));
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Ingredient has not been created, some data may be missing',
                'data' => null
            ];
            return response()->json($response, 422);
        }
        if (is_numeric($id)) {
            $response = [
                'success' => true,
                'message' => 'ingredient created successfully',
                'data' => ingredient::findOrFail($id)
            ];
            return response()->json($response, 200);
        }





    }
    public function deleteIngredient(Request $request, $id)
    {
        try {
            $deletedIngredient = ingredient::find($id);

            $ingredient = $deletedIngredient;
            $ingredient->delete();
            $response = [
                'success' => true,
                'message' => 'ingredient was deleted',
                'data' => $deletedIngredient
            ];
            return response()->json($response, 200);

        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'Ingredient has not been deleted because it wasnt not found',
                'data' => null
            ];
            return response()->json($response, 200);
        }



    }
    public function updateIngredient(Request $request, $id)
    {


        if ($ingredient = ingredient::find($id)) {

            try {
                $ingredient->update($request->validate([
                    'ingredient' => 'string',
                ]));
            } catch (Throwable $e) {
                report($e);

                $response = [
                    'success' => false,
                    'message' => 'Ingredient has not been updated, change the Ingredient name please',
                    'data' => null
                ];
                return response()->json($response, 422);
            }
            $ingredient->save();
            $response = [
                'success' => true,
                'message' => 'Ingredient updated successfully',
                'data' => $ingredient
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => 'Ingredient not found',
                'data' => null
            ];
            return response()->json($response, 200);
        }


    }
    public function getById(Request $request, $id)
    {
        $ingredient = ingredient::find($id);
        if ($ingredient != null) {
            $response = [
                'success' => true,
                'message' => 'Ingredient found successfully',
                'data' => $ingredient
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Ingredient not found',
                'data' => null
            ];
        }

        return response()->json($response, 200);

    public function supermarket(Request $request, $id) {
        
        $ingredient = ingredient::findOrFail($id);

        if ($ingredient != null && $ingredient->supermarket) {
            $response = [
                'success' => true,
                'message' => 'ingredient - supermarket successfull',
                'data' => $ingredient->supermarket
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'ingredient - supermarket unsuccessfull',
    }
    public function user(Request $request, $id)
    {
        $ingredient = ingredient::find($id);
        if ($ingredient) {

            if ($ingredient != null && $ingredient->user) {
                $response = [
                    'success' => true,
                    'message' => 'User found successfully',
                    'data' => $ingredient->user
    public function recipes(Request $request, $id)
    {
        $ingredient = ingredient::findOrFail($id);
        if ($ingredient) {

            if ($ingredient != null && $ingredient->recipe) {
                $response = [
                    'success' => true,
                    'message' => 'ingredient with recipe found successfully',
                    'data' => $ingredient->recipe
                ];
            } else {
                $response = [
                    'success' => false,

                    'message' => 'ingredient with recipe not found',

                    'data' => null
                ];
            }
        } else {
            $response = [
                'success' => false,

                'message' => 'ingredient with recipe not found',
                'data' => null
            ];
        }

        return response()->json($response);
    
    }

}


}