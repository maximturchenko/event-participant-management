<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [      
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $success['token'] =  $user->createToken('AppEvents')->accessToken;
        $success['name'] =  $user->name;
        return $this->sendResponse($success, 'User register successfully.');
    }
 
    public function login (Request $request) {
        $lodinDate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    if(!Auth::attempt($lodinDate)){    
        return response(['message'=>'Invalid credentials.']);
    }
    $user = User::where('email', $request->email)->first();

    if ($user) {

        if (Hash::check($request->password, $user->password)) {

            $success['token'] =  $user->createToken('AppEvents')->accessToken;
            $success['name'] =  $user->name;
            return $this->sendResponse($success, 'User login successfully.'); 
        }
    }



    }
    
    public function logout (Request $request) {
    
        $token = $request->user()->token();
        $token->revoke();
    
        $response = 'You have been succesfully logged out!';
        return response($response, 200);
    
    }
    



}
