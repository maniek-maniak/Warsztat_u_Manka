<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Repositories\UserRepository;



class AuthController extends Controller
{
    public function register(Request $request, UserRepository $userRepo){

        $data = $request->all();  

        return $userRepo->create([
            'name'=>$data['name'],
            'type'=>'user',
            'email'=>$data['email'],
            'password'=>Hash::make($data['password'])

        ]);

    }

    public function login(Request $request){

        if (!Auth::Attempt($request->only('email','password' ))){
            return response ([
                'message' => 'Invalid credentials!'
            ], status: 401);  //HTTP_UNAUTHORIZED
        }

        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 30);

        return response(['message'=>$token ])->withcookie($cookie);
    }

    public function test(){
        return $user = Auth::user();
        
  
    }
}
