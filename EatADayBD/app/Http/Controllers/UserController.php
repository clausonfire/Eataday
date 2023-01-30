<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Throw_;
use Throwable;

class UserController extends Controller
{
    //

    public function getAll(Request $request)
    {
        // return response()->json('Devuelvo todos los usuarios');
        $users = DB::table('users')->get();

        $response = [
            'success' => true,
            'message' => 'usuarios obtenidos correctamente',
            'data' => $users
        ];
        return response()->json($response);
    }

    public function getById(Request $request, $id)
    {
        //FROM pets
        try {
            $users =  DB::table('users')->where('id', $id)->get();
            $response = [
                'success' => true,
                'message' => "Usuario con id: $id se ha obtenido correctamente",
                'data' => $users
            ];
        } catch (ModelNotFoundException $ex) {
            return $a = [
                'success' => false,
                'message' => "Error, el Id introducido no existe en la db"
            ];
            return response()->json($a);
        }
    }

    public function create(Request $request)
    {
        // return response()->json('Creo una mascota');

        //name, age, chip

        $datos = $request->validate([
            'name' => 'required|string',
            'mail' => 'required|string|unique:users',
            'password' => 'required|string',

        ]);

        DB::table('users')->insert($datos);
        $response = [
            'success' => true,
            'message' => "Usuario creado correctamente",
            'data' => $datos
        ];
        return response()->json($response);
    }

    //si la ruta lleva un parametro, la funcion tambien tiene que recibirlo
    public function delete(Request $request, $id)
    {

        try {
            $deletedUser = User::find($id);
            $user = $deletedUser;
            $user->delete();
            $response = [
                'success' => true,
                'message' => 'Usuario borrado',
                'data' => $deletedUser
            ];
            return response()->json($response);

            // DB::table('users')
            //     //WHERE id=$id
            //     ->where('id', $id)
            //     //DELETE
            //     ->delete();
            // return response()->json('Borro una mascota con id ' . $id);

        } catch (Throwable $a) {
            report($a);

            $response = [
                'success' => false,
                'message' => 'No se encuentra el usuario para borrarlo',
                'data' => null
            ];
            return response()->json($response);
        }
    }

    public function modify(Request $request, $id)
    {


        if ($user = User::find($id)) {

            try {
                $user->update($request->validate([
                    'name' => 'string',
                    'email' => 'string',
                    'password' => 'string',
                    'role_id' => 'string'
                ]));
            } catch (Throwable $a) {
                report($a);

                $response = [
                    'success' => false,
                    'message' => 'Error al modificar el Usuario',
                    'data' => null
                ];
                return response()->json($response);
            }
            $user->save();
            $response = [
                'success' => true,
                'message' => 'Usuario modificado con exito',
                'data' => $user
            ];
            return response()->json($response);
        } else {
            $response = [
                'success' => false,
                'message' => 'Usuario no encontrado',
                'data' => null
            ];
            return response()->json($response);
        }
    }

    public function role(Request $request, $id)
    {
        $user = User::findorFail($id);
        return response()->json($user->role);
    }
}
