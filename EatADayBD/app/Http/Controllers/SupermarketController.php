<?php

namespace App\Http\Controllers;

use App\Models\Supermarket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SupermarketController extends Controller
{
    public function getAll(Request $request){
        $supermarkets = Supermarket::all();
        $response = [
            'success' => true,
            'message' => "Supermercados obtenidos",
            'data' => $supermarkets
        ];
        return response()->json($response);
    }

    public function createSupermarket(Request $request) {

        $name = $request->input('name');
        $description = $request->input('description');
        $photo = $request->input('photo');

        $datos = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'photo' => 'required|string',
        ]);

        DB::table('supermarkets')->insert($datos);
    }

    public function delete(Request $request, $id) {
        DB::table('supermarkets')
        ->where('id', $id)
        ->delete();
    }
   
    public function getById(Request $request, $id) {
        
        $supermarket = Supermarket::find($id);

        if ($supermarket != null) {
            $response = [
                'success' => true,
                'message' => 'Supermarket found successfully',
                'data' => $supermarket
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Supermarket not found',
                'data' => null
            ];
        }

        return response()->json($response);
    }

    public function modify(Request $request, $id) {
        try {
            Supermarket::findOrFail($id);

            $name = $request->input('name');
            $description = $request->input('description');
            $photo = $request->input('photo');

            $datos = $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'photo' => 'required|string',
            ]);

            DB::table('supermarkets')->where('id', $id)->update($datos);
            $response = [
                'success' => true,
                'message' => "Supermercado con id: $id se ha modificado correctamente",
                'data' => $datos
            ];

            return response()->json($response);

        }catch (ModelNotFoundException $ex) {
            $response = [
                'success' => false,
                'message' => "Error, el Id introducido no existe en la base de datos",
                'data' => null
            ];
            return response()->json($response);
        }
    }

    public function ingredient(Request $request, $id) {
        
        $supermarket = Supermarket::findOrFail($id);

        if ($supermarket != null && $supermarket->ingredient) {
            $response = [
                'success' => true,
                'message' => 'supermarket - ingredient successfull',
                'data' => $supermarket->ingredient
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'supermarket - ingredient unsuccessfull',
                'data' => null
            ];
        }

        return response()->json($response);
    
    }

}   

