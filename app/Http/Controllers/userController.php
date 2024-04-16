<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

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
}
