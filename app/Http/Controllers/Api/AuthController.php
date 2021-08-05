<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

use App\Repositories\UserRepository;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


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

          $credentials = $request->only('email','password');  // na skruty => return $token = JWTAuth::attempt($userData);

        if (!$token = JWTAuth::Attempt($credentials)){
//        if (!$token = auth()->attempt($credentials)){    // zwraca 1
            return response ([
                'message' => 'Invalid credentials!'
            ], status: 401);  //HTTP_UNAUTHORIZED
        }

//        $user = JWTAuth::user();

        return $token;  // jeśli to zakomentuję utworzone zostanie cookie
        
        $cookie = cookie('jwt', $token, 30);

        return response(['message'=>$token ])->withcookie($cookie);
       
    }

    public function me(){

        return auth()->user();
        
    }

    public function logout(){
       
        // $cookie = Cookie::forget('jwt');
        // return response(['message'=>'oki'])->withcookie($cookie);
        // $cookie = cookie('jwt', $token, 30);

        // return response(['message'=>$token ])->withcookie($cookie);
    }

}
