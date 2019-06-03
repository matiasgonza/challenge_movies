<?php

namespace App\Http\Controllers\Auth_Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\User;

use Illuminate\Support\Facades\Auth;

use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // $roles = Role::pluck('name','name')->all();
            // $userRole = $user->roles->pluck('name')->all();

            $token =  $user->createToken('MyApp')->accessToken;
            return response()->json([
                'token' => $token,
                'user' => $user,
                // 'rol' => $userRole
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
