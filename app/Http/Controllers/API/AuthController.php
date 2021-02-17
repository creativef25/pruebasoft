<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function login(Request $re){
      $loginData = $re->validate([
        'email' => 'email|required',
        'password' => 'required'
      ]);

      if (!auth()->attempt($loginData)) {
        return response(['message' => 'This User does not exist, check your details'], 400);
      }

      $accessToken = auth()->user()->createToken('authToken')->accessToken;

      return response(['user' => auth()->user(), 'access_token' => $accessToken]);


    }
}