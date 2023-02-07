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
                'data' => null
            ];
        }

        return response()->json($response);
    
    }

}

