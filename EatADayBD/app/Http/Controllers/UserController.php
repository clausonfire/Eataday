<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class UserController extends Controller
{
    //

    public function getAll(Request $request){
        // return response()->json('Devuelvo todos los usuarios');
        $users = DB::table('users')->get();

        $response = [
            'success' => true,
            'message' => 'usuarios obtenidos correctamente',
            'data' => $users
        ];
        return response()->json($response);
    }

    public function getById(Request $request, $id){
        //FROM pets
        DB::table('users')->where('id', $id)->get();


    }

    public function create (Request $request) {
        // return response()->json('Creo una mascota');

        //name, age, chip

        $datos = $request->validate([
            'name' => 'required|string',
            'mail' => 'required|string|unique:users',
            'password' => 'required|string',

        ]);

        DB::table('users')->insert($datos);

    }

    //si la ruta lleva un parametro, la funcion tambien tiene que recibirlo
    public function delete(Request $request, $id){

        //FROM pets
        DB::table('users')
        //WHERE id=$id
        ->where('id', $id)
        //DELETE
        ->delete();
        // return response()->json('Borro una mascota con id ' . $id);

    }






    public function ingredients(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {

            if ($user != null && $user->ingredient) {
                $response = [
                    'success' => true,
                    'message' => 'Ingredients found successfully',
                    'data' => $user->ingredient
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Ingredients not found',
                    'data' => null
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'User not found',
                'data' => null
            ];
        }


        return response()->json($response, 200);
    }
}
