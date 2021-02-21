<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function createUser(Request $req)
    {
        //check if user already exists
        $user = User::where('email',$req->email);
        if($user->count() > 0){
            return response()->json(['message'=>'User already exists'],400);
        }

        //Make a new account
        $createdUser = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        if(!$createdUser){
            return response()->json(['message'=>'Error'],401);
        }

        //log the user in
        $login = new LoginController;
        $response = $login->loginUser($req->email,$req->password);

        if($response == true){
            return response()->json(['status'=>'loggedin'],200);
        }
        else{
            return response()->json(['message'=>'Error'],401);
        }



    }
}
