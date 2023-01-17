<?php

namespace App\Http\Controllers;

    use App\Models\Recipe;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    public function getAll(Request $request){
        $respuesta = Recipe::all();
        $response = [
            'success' => true,
            'message' => "Recetas obtenidas correctamente",
            'data' => $respuesta
        ];
        return response()->json($response);

    }

    public function getId(Request $request, $id){
        try {
            $respuesta = Recipe::findOrFail($id);
            $response = [
                'success' => true,
                'message' => "Receta con id: $id obtenido correctamente",
                'data' => $respuesta
            ];
            return response()->json($response);
        } catch (ModelNotFoundException $ex) {
            return $a = [
                'success' => false,
                'message' => "Error, el Id introducido no existe ne la db"
            ];
            return response()->json($a);
        }

    }


    public function create(Request $request){
        $title = $request->input('title');
        $photo = $request->input('photo');
        $ingredients = $request->input('ingredients');
        $preparation = $request->input('preparation');

        $datos = $request->validate([
            //obligatorio y tiene que ser el tipo de variable marcado
            'title' => 'required|string',
            'photo' => 'nullable|string',
            'ingredients' => 'required|string',
            'preparation' => 'required|string',
        ]);

        //query building
        DB::table('recipes')->insert($datos);
        $response = [
            'success' => true,
            'message' => "Receta creado correctamente",
            'data' => $datos
        ];
        return response()->json($response);
    }

    public function delete(Request $request, $id){
        try {
            $respuesta = Recipe::findOrFail($id);
            DB::table('recipes')->where('id', $id)->delete();
            $response = [
                'success' => true,
                'message' => "Receta con id: $id borrado correctamente",
                'data' => $respuesta
            ];
            return response()->json($response);
        } catch (ModelNotFoundException $ex) {
            return $a = [
                'success' => false,
                'message' => "Error, el Id introducido no existe ne la db"
            ];
            return response()->json($a);
        }

    }

    public function modify(Request $request, $id){
        try {
            Recipe::findOrFail($id);
            $title = $request->input('title');
            $photo = $request->input('photo');
            $ingredients = $request->input('ingredients');
            $preparation = $request->input('preparation');

            $datos = $request->validate([
                'title' => 'required|string',
                'photo' => 'nullable|string',
                'ingredients' => 'required|string',
                'preparation' => 'required|string',
            ]);

            //query building
            DB::table('recipes')->where('id', $id)->update($datos);
            $response = [
                'success' => true,
                'message' => "Receta con id: $id modificado correctamente",
                'data' => $datos
            ];
            return response()->json($response);
        } catch (ModelNotFoundException $ex) {
            return $a = [
                'success' => false,
                'message' => "Error, el Id introducido no existe ne la db"
            ];
            return response()->json($a);
        }
    }
}
