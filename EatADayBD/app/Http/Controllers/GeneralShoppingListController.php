<?php

namespace App\Http\Controllers;

use App\Models\GeneralShoppingList;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class GeneralShoppingListController extends Controller
{
    public function getAll(Request $request)
    {
        try {
            $generalShoppingList = GeneralShoppingList::all();
        } catch (Throwable $e) {
            return response('Any GeneralShoppingList found');
        }

        $response = [];

        if (isset($generalShoppingList[0])) {
            $response = [
                'success' => true,
                'message' => "GeneralShoppingList fetched successfully",
                'data' => $generalShoppingList
            ];

            return response()->json($response);
        } else {

            $response = [
                'success' => false,
                'message' => "No GeneralShoppingList found",
                'data' => null
            ];
            return response()->json($response);
        }
    }
    public function getById(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $generalShoppingList = GeneralShoppingList::where('user_id', $user->id)->get();
            if (!$generalShoppingList->isEmpty()) {
                // json_decode($generalShoppingList[0]->ingredients, true);
                $response = [
                    'success' => true,
                    'message' => 'ShoppingList found successfully',
                    'data' => $generalShoppingList[0]
                ];
                return response()->json($response);
            }
            $newUserList = GeneralShoppingList::create([
                'user_id' => $id,
                'ingredients' => ['pan', 'leche', 'agua']
            ]);

            if ($newUserList) {

                $response = [
                    'success' => true,
                    'message' => 'ShoppingList has been created and ingredients were inserted',
                    'data' => $newUserList
                ];
                return response()->json($response);
            }
            $response = [
                'success' => false,
                'message' => 'Something failed while creating the list',
                'data' => null
            ];
            return response()->json($response);

        }

        $response = [
            'success' => false,
            'message' => 'User not found',
            'data' => null
        ];

        return response()->json($response, 404);
    }
    public function create(Request $request)
    {
        $id = null;
        try {
            $id = GeneralShoppingList::insertGetId($request->validate([
                'ingredients' => 'required|string',
                'user_id' => 'required|number',

            ]));
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'GeneralShoppingList has not been created, some data may be missing',
                'data' => null
            ];
            return response()->json($response, 422);
        }
        if (is_numeric($id)) {
            $response = [
                'success' => true,
                'message' => 'GeneralShoppingList created successfully',
                'data' => GeneralShoppingList::findOrFail($id)
            ];
            return response()->json($response);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $deletedGeneralShoppingList = GeneralShoppingList::find($id);

            $shoppingList = $deletedGeneralShoppingList;
            $shoppingList->delete();
            $response = [
                'success' => true,
                'message' => 'GeneralShoppingList was deleted',
                'data' => $deletedGeneralShoppingList
            ];
            return response()->json($response);

        } catch (Throwable $e) {
            report($e);
            $response = [
                'success' => false,
                'message' => 'GeneralShoppingList has not been deleted because it wasnt not found',
                'data' => null
            ];
            return response()->json($response);
        }
    }

    public function update(Request $request, $id)
    {
        $shoppingList = GeneralShoppingList::find($id);
        if ($shoppingList) {

            try {
                $shoppingList->update($request->validate([
                    'ingredients' => 'required|string',
                    'user_id' => 'required|number',
                ]));
            } catch (Throwable $e) {
                report($e);

                $response = [
                    'success' => false,
                    'message' => 'GeneralShoppingList has not been updated, change the role name please',
                    'data' => null
                ];
                return response()->json($response, 422);
            }
            $shoppingList->save();
            $response = [
                'success' => true,
                'message' => 'GeneralShoppingList updated successfully',
                'data' => $shoppingList
            ];
            return response()->json($response);
        } else {
            $response = [
                'success' => false,
                'message' => 'GeneralShoppingList not found',
                'data' => null
            ];
            return response()->json($response);
        }
    }

    public function deleteIngredient(Request $request, $userId, $ingredientABorrar)
    {
        $user = User::find($userId);
        $lista = GeneralShoppingList::find($user->userGeneralShoppingList->id);
        if ($user) {

            $ingredients = json_decode($lista->ingredients, true);
            $posicioningredientABorrar = array_search($ingredientABorrar, $ingredients);
            if ($posicioningredientABorrar !== false) {
                array_splice($ingredients, $posicioningredientABorrar, 1);
            }

            $lista->ingredients = json_encode($ingredients);
            $lista->save();

            $response = [
                'success' => true,
                'message' => 'Ingredient deleted successfully',
                'data' => $lista->ingredients
            ];
            return response()->json($response);
        }
        $response = [
            'success' => true,
            'message' => 'Ingredient deleted successfully',
            'data' => null
        ];
        return response()->json($response, 404);
    }
    public function insertIngredient(Request $request)
    {
        if (!$request->has('user_id') || !$request->has('ingredient')) {
            $response = [
                'success' => false,
                'message' => 'missing data',
                'data' => null
            ];
            return response()->json($response);
        }

        $id = $request->input('user_id');
        $ingredient = $request->input('ingredient');
        $user = User::find($id);
        if ($user) {
            // echo "Entre en user";
            $relacionListaUser = $user->userGeneralShoppingList;
            if ($relacionListaUser) {
                $lista = GeneralShoppingList::find($user->userGeneralShoppingList->id);
                if ($lista != null) {
                    $ingredientesLista = json_decode($lista->ingredients, true);
                    if (!in_array($ingredient, $ingredientesLista)) {
                        $ingredientesLista[] = $ingredient;
                        $lista->ingredients = json_encode($ingredientesLista);
                        $lista->save();
                    }
                    $response = [
                        'success' => true,
                        'message' => 'List Found',
                        'data' => $lista
                    ];
                    return response()->json($response);

                }
            }




            // if ($user) {
            //     $lista = GeneralShoppingList::find($user->userGeneralShoppingList->id);
            //     echo $lista;
            //     $ingredientesLista = $lista->ingredients;
            //     if (!in_array($ingredient, $ingredientesLista)) {
            //         $ingredientesLista[] = $ingredient;
            //         $lista->ingredients = $ingredientesLista;

            //         $lista->save();
            //     }
            //     $response = [
            //         'success' => false,
            //         'message' => 'missing data',
            //         'data' => null
            //     ];
            //     return response()->json($response);
            // }
            // echo $ingredient;
            // echo $user;
        }
        $response = [
            'success' => false,
            'message' => 'User not found',
            'data' => $user
        ];
        return response()->json($response);
    }
}
