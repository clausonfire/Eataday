<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;


class UserController extends Controller
{
    //

    public function getAll(Request $request)
    {
        // return response()->json('Devuelvo todos los usuarios');
        try {
            $users = User::table('users')->get();
        } catch (Throwable $e) {
            return response('Any user found', 200);
        }

        if (isset($users[0])) {
            $response = [
                'success' => true,
                'message' => "Users fetched successfully",
                'data' => $users
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => "No users found",
                'data' => null
            ];
            return response()->json($response, 200);
        }
    }

    public function getById(Request $request, $id)
    {
        //FROM pets

        $users = User::table('users')->where('id', $id)->get();
        if ($users != null) {
            $response = [
                'success' => true,
                'message' => 'Users found successfully',
                'data' => $users
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Users not found',
                'data' => null
            ];
        }

        return response()->json($response, 200);
    }

    public function create(Request $request)
    {
        // return response()->json('Creo una mascota');

        //name, age, chip

        $id = null;
        try {
            $id = User::insertGetId($request->validate([
                'name' => 'required|string',
                'mail' => 'required|string|unique:users',
                'password' => 'required|string',
            ]));
        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'User has not been created, some data may be missing',
                'data' => null
            ];
            return response()->json($response, 422);
        }
        if (is_numeric($id)) {
            $response = [
                'success' => true,
                'message' => 'User created successfully',
                'data' => User::findOrFail($id)
            ];
            return response()->json($response, 200);
        }
    }

    //si la ruta lleva un parametro, la funcion tambien tiene que recibirlo
    public function delete(Request $request, $id)
    {

        //FROM pets
        DB::table('users')
            //WHERE id=$id
            ->where('id', $id)
            //DELETE
            ->delete();
        // return response()->json('Borro una mascota con id ' . $id);


        try {
            $deletedUser = User::find($id);

            $user = $deletedUser;
            $user->delete();
            $response = [
                'success' => true,
                'message' => 'User was deleted',
                'data' => $deletedUser
            ];
            return response()->json($response, 200);

        } catch (Throwable $e) {
            report($e);

            $response = [
                'success' => false,
                'message' => 'User has not been deleted because it wasnt not found',
                'data' => null
            ];
            return response()->json($response, 200);
        }

    }
}
