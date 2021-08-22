<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Validator;

class authController extends Controller
{
    public function register (Request $request){
        return false;
        $fields = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:user,email',
            'password'=>'required|string|confirmed'
            
        ]);
        
        $user = User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'password'=>bcrypt($fields['password']),
            'token'=> Str::random(60)
            ]);

        
        $response = [
            'user'=>$user,
            'token'=>$user->token
        ];
        return response($response, 201);
        
    }
    public function login (Request $request){
        // return $request->all();
        $validator = Validator::make($request->all(),[
            'email'=>'required|string|email',
            'password'=>'required|string|min:8'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }


        //  Chek email 
        $admin=Admin::where('email',$request->email)->first();
        
        //Chek password 
        if(!$admin|| !Hash::check($request->password,$admin->password)){
            return response([
                'message'=>'bad creds'
            ],401);
        }
        //    $token = $admin->creatToken('myapptoken')->plainTesxtToken;
           $token = Str::random(64);
           Admin::where('id',$admin->id)->update(['token'=>$token]);
           $admin = Admin::find($admin->id);
           $response = [
               'admin'=>$admin,
               'token'=>$admin->token
           ];
           return response($response, 201);
           
       }
    public function logout(Request $request){
        auth()->user()->token()->delete();
        
        return [
            'message'=>'logged out'
        ];
    }
    // public function signIn(Request $request){
        
    // }

}