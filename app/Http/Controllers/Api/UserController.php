<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Backend\Articulo;
use LucaDegasperi\OAuth2Server\Authorizer;
use Watson\Validating\ValidationException;



class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return response()->json($users,200);
    }

    public function user(Authorizer $authorizer){
        $user_id=$authorizer->getResourceOwnerId();        
        $user=User::find($user_id);
        return response()->json($user,200);
    }
    
    public static function create(Request $request)
    {   
        try {
            $user = User::create([
            'name' => $request['nombre'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'direccion' => $request['direccion'],
            'latitud' => $request['latitud'],
            'longitud' => $request['longitud'],
            ]);
        } catch (ValidationException $e) {

            return Response()->json($e->getErrors(),202);
        }try {
            $user->attachRole('4'); //los usuarios que se registran son clientes
            $user->save();
        } catch (ValidationException $e){
            return Response()->json($e->getErrors(),500);
        }        

        return Response()->json($user, 200);
 
    }
}