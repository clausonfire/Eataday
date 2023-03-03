<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use App\Models\Supermarket;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class ShoppingListController extends Controller
{
    public function getAll(Request $request)
    {
        try {
            $shoppingList = ShoppingList::all();
        } catch (Throwable $e) {
            return response('Any ShoppingList found');
        }

        $response = [];

        if (isset($shoppingList[0])) {
            $response = [
                'success' => true,
                'message' => "ShoppingList fetched successfully",
                'data' => $shoppingList
            ];

            return response()->json($response);
        } else {

            $response = [
                'success' => false,
                'message' => "No shoppingList found",
                'data' => null
            ];
            return response()->json($response);
        }
    }
    public function getById(Request $request, $idUser, $idSupermercado)
    {
        if (!$request->has('user_id') || !$request->has('supermarket') || !$request->has('ingredient')) {
            $response = [
                'success' => false,
                'message' => 'missing data',
                'data' => 'oops'
            ];
            return response()->json($response);
        }
        $id = $request->input('user_id');
        $supermarket = $request->input('supermarket');
        $ingredient = $request->input('ingredient');
        $user = User::find($id);
        if ($user) {
            // hola
        // if ($shoppingList != null) {
        //     json_decode($shoppingList->ingredients);
        //     $response = [
        //         'success' => true,
        //         'message' => 'ShoppingList found successfully',
        //         'data' => $shoppingList
        //     ];
        }// }
            $response = [
                'success' => false,
                'message' => 'User not found',
                'data' => null
            ];

        return response()->json($response);
    }
    public function create(Request $request)
    {
        $id = null;
        try {
            $id = ShoppingList::insertGetId($request->validate([
                'ingredients' => 'required|string',
                'user_id' => 'required|number',
                'supermarket_id' => 'required|number'

            ]));
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'ShoppingList has not been created, some data may be missing',
                'data' => null
            ];
            return response()->json($response, 422);
        }
        if (is_numeric($id)) {
            $response = [
                'success' => true,
                'message' => 'ShoppingList created successfully',
                'data' => ShoppingList::findOrFail($id)
            ];
            return response()->json($response);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $deletedShoppingList = ShoppingList::find($id);

            $shoppingList = $deletedShoppingList;
            $shoppingList->delete();
            $response = [
                'success' => true,
                'message' => 'ShoppingList was deleted',
                'data' => $deletedShoppingList
            ];
            return response()->json($response);

        } catch (Throwable $e) {
            report($e);
            $response = [
                'success' => false,
                'message' => 'ShoppingList has not been deleted because it wasnt not found',
                'data' => null
            ];
            return response()->json($response);
        }
    }

    public function update(Request $request, $id)
    {
        if ($shoppingList = ShoppingList::find($id)) {

            try {
                $shoppingList->update($request->validate([
                    'ingredients' => 'required|string',
                    'user_id' => 'required|number',
                    'supermarket_id' => 'required|number'
                ]));
            } catch (Throwable $e) {
                report($e);

                $response = [
                    'success' => false,
                    'message' => 'ShoppingList has not been updated, change the role name please',
                    'data' => null
                ];
                return response()->json($response, 422);
            }
            $shoppingList->save();
            $response = [
                'success' => true,
                'message' => 'ShoppingList updated successfully',
                'data' => $shoppingList
            ];
            return response()->json($response);
        } else {
            $response = [
                'success' => false,
                'message' => 'ShoppingList not found',
                'data' => null
            ];
            return response()->json($response);
        }
    }


    public function insertIngredient(Request $request)
    {
        if (!$request->has('user_id') || !$request->has('supermarket') || !$request->has('ingredient')) {
            $response = [
                'success' => false,
                'message' => 'missing data',
                'data' => 'oops'
            ];
            return response()->json($response);
        }
        $id = $request->input('user_id');
        $supermarket = $request->input('supermarket');
        $ingredient = $request->input('ingredient');
        $user = User::find($id);
        if ($user) {
            $selectedSupermarket = Supermarket::find($supermarket['id']);
            if ($selectedSupermarket != null) {
                $userSupermarketList = ShoppingList::where('user_id', $id)
                    ->where('supermarket_id', $selectedSupermarket['id'])
                    ->get();
                if ($userSupermarketList->isEmpty()) {
                    $newSupermarketList = ShoppingList::create([
                        'user_id' => $id,
                        'supermarket_id' => $selectedSupermarket['id'],
                        'ingredients' => [$ingredient]
                    ]);

                    if ($newSupermarketList) {
                        $response = [
                            'success' => true,
                            'message' => 'ShoppingList has been created and ingredients were inserted',
                            'data' => $newSupermarketList
                        ];
                        return response()->json($response);
                    }
                    $response = [
                        'success' => false,
                        'message' => 'Something failed while creating the list',
                        'data' => null
                    ];
                    return response()->json($response);

                } else {
                    $ingredients = $userSupermarketList[0]->ingredients;
                    print_r($ingredients);
                    if (!in_array($ingredient, $ingredients)) {
                        $ingredients[] = $ingredient;
                        echo "patata";
                        $userSupermarketList[0]->ingredients = $ingredients;

                        $userSupermarketList[0]->save();
                    }

                    $response = [
                        'success' => true,
                        'message' => 'Ingredients were inserted',
                        'data' => $userSupermarketList
                    ];
                    return response()->json($response);
                }



            }
            $response = [
                'success' => true,
                'message' => 'Supermarket not found',
                'data' => $selectedSupermarket
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
