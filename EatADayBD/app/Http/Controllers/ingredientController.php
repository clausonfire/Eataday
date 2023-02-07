<?php

namespace App\Http\Controllers;

use App\Models\ingredient;
use Illuminate\Http\Request;

class ingredientController extends Controller

{
    public function index() {
        $ingredient = ingredient::all();
        return response()->json($ingredient);
    }

    public function show(Request $request) {
        $ingredient = ingredient::findOrFail($request->id);
        return response()->json($ingredient);
    }

    public function store(Request $request) {

        $ingredient = ingredient::create($request->all());

        return response()->json($ingredient);
    }

    public function update(Request $request) {

        $ingredient = ingredient::find($request->id);

        $ingredient->update($request->all());

        return response()->json($ingredient);
    }

    public function delete(Request $request) {
        $ingredient = ingredient::findOrFail($request->id)->delete();

        return response()->json($ingredient);

    }

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
        return response()->json($response, 200);
    }
}

