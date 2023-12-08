<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        try {
            $user = User::where('email', $request->email)->first();
            if(!$user || !Hash::check($request->password, $user->password)) {
                throw new \Exception('Falha na autenticação!');
            }

            // $abilitie = $user->is_admin ? ['is-admin'] : [];
            $token = $user->createToken($request->email)->plainTextToken;
            return response()->json(['token'=>$token]);
        } catch(\Exception $error) {
            return response()->json([
                'erro'=>$error->getMessage()
            ], 401);
        }
    }
}
