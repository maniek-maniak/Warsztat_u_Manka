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

        $userData = Request->only(keys: 'email', 'password');

        return $token = JWTAuth::attempt($userData);

        // if (!JWTAuth::Attempt($request->only('email','password' ))){
        //     return response ([
        //         'message' => 'Invalid credentials!'
        //     ], status: 401);  //HTTP_UNAUTHORIZED
        // }

        // $user = Auth::user();
        //return $user->createToken('token-name', ['server:update'])->plainTextToken;
        // $token = $user->createToken('token')->plainTextToken;

       // return $token =  $user->createToken('token', ['server:update'])->plainTextToken;

        //$cookie = cookie('jwt', $token, 30);

        //return response(['message'=>$token ])->withcookie($cookie);
       
    }

    //public function test(Request $request){

        //return $val = Cookie::get('jwt');
        //return $ipAddress = $request->ip();
        //return $user = $request->user();
        //return $cos = Token::get('token');
        
        // $user = Auth::user();

        // if ($val->tokenCan('server:update')) {
        //     return 'OKI';
        // }

        //return user::all();
        
    //}

    //public function logout(){
       
        // $cookie = Cookie::forget('jwt');
        // return response(['message'=>'oki'])->withcookie($cookie);
        // $cookie = cookie('jwt', $token, 30);

        // return response(['message'=>$token ])->withcookie($cookie);
    //}

    // public function test(Request $request){
    //     //return $user = Auth::user();
    //     return $request->user()->tokenCan('server:update');
  
    // }
}
