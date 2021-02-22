<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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

    public function logout(Request $re){
      $re->user()->token()->revoke();

      return response(['message' => "Sesion Terminada Exitosamente"]);
    }

    public function forgot(){
      $credentials = request()->validate(['email' => 'required|email']);

      Password::sendResetLink($credentials);

      return response(['message' => 'Se envio datos a su correo electronico']);
    }

    public function reset(){
      $credentials = request()->validate([
        'email' => 'required|email',
        'token' => 'required|string',
        'password' => 'required|string|confirmed'
      ]);

      $reset_password_status = Password::reset($credentials, function($user, $password){
        $user->password = $password;
        $user->save();
      });

      if ($reset_password_status == Password::INVALID_TOKEN) {
        return response(['message' => "Token Invalido"], 400);
      }

      return response(['message' => "La contraseña fue actualizada correctamente."]);
    }
}
