<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginUser($email, $password)
    {
        $attempt = Auth::attempt(['email' => $email, 'password' => $password]);

        if($attempt){
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
            return response()->json(['message'=>'error'],200);
        }
    }

    public function logoutUser()
    {
        $attempt = Auth::logout();

        if($attempt){
            return response()->json(['message'=>'succesfully logged out'],200);
        }
        else{
            return response()->json(['message'=>'error'],200);
        }
    }
}
