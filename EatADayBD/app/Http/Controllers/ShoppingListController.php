<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function getById(Request $request, $id)
    {
        $shoppingList = ShoppingList::find($id);

        if ($shoppingList != null) {
            json_decode($shoppingList->ingredients);
            $response = [
                'success' => true,
                'message' => 'ShoppingList found successfully',
                'data' => $shoppingList
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'ShoppingList not found',
                'data' => null
            ];
        }
        return response()->json($response);
    }
    public function create(Request $request)
    {
        $id = null;
        try {
            $id = ShoppingList::insertGetId($request->validate([
                'title' => 'required|string',
                'photo' => 'nullable|string',
                'ingredients' => 'required|string',
                'preparation' => 'required|string'
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
                    'title' => 'required|string',
                    'photo' => 'nullable|string',
                    'ingredients' => 'required|string',
                    'preparation' => 'required|string',
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
    public function getAllUserLists($id)
    {
        $user = User::find($id);
        if($user){
            $shoppingLists = $user->shoppingLists;
        }

        $response = [
            'success' => false,
            'message' => 'ShoppingList not found',
            'data' => $shoppingLists
        ];
        return response()->json($response);

    }
}
