<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    //
    function register(Request $req){
        $user = User::create([
            "name" => $req->input('name'),
            "email" => $req->input('email'),
            "password" => $req->input('password')
        ]);
        return $user;
    }

    function getAllUsers(Request $req){
        $users = User::all();
        return $users;
    }

    function login(Request $req){
        $user = User::where('email',$req->input('email'))->first();
        if(!$user){
            return response()->json(["message" => "user not found"],401);
        }
        // if(!$user->password != $req->input('password')){
        //     return response()->json(["message" => "wrong password"]);
        // }

        // لان الباسورد يتم تشفيرها باي ديفولت فلما يجي يقارن يطلع نتيجه المقارنه فولصت ف الافضل نفك التشفير وبعده نقارن
        if(Hash::check($req->input('password'),$user->password)){
            return response()->json(["message" => "wrong password"],401);
        }

        $token = $user->createToken('auth_token');
        return response()->json(["token" => $token->plainTextToken]);
    }
}
