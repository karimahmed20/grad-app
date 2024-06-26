<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
       
    }

    public function register(RegisterRequest $request)
    {

        /** @var \App\Models\User $user */
        
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => bcrypt($data['password']),
        ]);

        $token =  $user ->createToken('main')->plainTextToken;
        return response(compact('user','token'));
    }

    public function logout(Request $request)
    {
       

    }
    
}
