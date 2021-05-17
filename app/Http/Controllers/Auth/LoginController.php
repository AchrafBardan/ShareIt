<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginUser($email, $password, $token_name = null)
    {
        $attempt = Auth::attempt(['email' => $email, 'password' => $password]);


        if($attempt){
            if($token_name != null){
                return auth()->user()->createToken($token_name)->plainTextToken;
            }
            return true;
        }
        else{
            return false;
        }
    }


    public function login(Request $req)
    {
        $login = $this->loginUser($req->email,$req->password);

        if($login){
            return response()->json(['message'=>'succesfully logged in'],200);
        }
        else{
            return response()->json(['message'=>'error'],400);
        }
    }

    public function loginWithApiToken(Request $req)
    {

        $login = $this->loginUser($req->email,$req->password,$req->token_name);

        if($login){
            return response()->json(['message'=>'succesfully logged in','token'=>$login],200);
        }
        else{
            return response()->json(['message'=>'error'],400);
        }
    }

    public function logoutUser()
    {
        $attempt = Auth::logout();

        if($attempt){
            return response()->json(['message'=>'succesfully logged out'],200);
        }
        else{
            return response()->json(['message'=>$attempt],400);
        }
    }
}
