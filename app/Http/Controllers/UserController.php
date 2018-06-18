<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public $successStatus=200;



    public function login()
    {
    	if(Auth::attempt(['email'=>request('email'),'password'=>request('password')])){
    		$user = Auth::user();
    		$success['token'] =$user->createToken('MyApp')->accessToken;
    		return response()->json(['success'=> $success], $this->successStatus);
    	}
    	else
    	{
    		return resposne()->json(['error'=>'Unauthorised'],401);
    	}
    }

    public function register(Request $request)
    {
    	$validator = Validator::make($request->all(),[

    		'name'=>'required',
    		'email' => 'required|email',
    		'password'=> 'required',
    		'c_password'=>'required|same:password',


    	]);
    	if($validator->fails())
    	{
    		return response()->json(['error'=>$validator->errors()],401);
    	}
        //This try/catch is to error handle duplicate entrys into the database for users so it returns an error.
        try
        {
    	$input=$request->all();
    	$input['password']=bcrypt($input['password']);
        
    	$user = User::create($input);
    	$success['token'] = $user->createToken('MyApp')->accessToken;
    	$success['name']=$user->name;
        return response()->json(['success'=>$success],$this->successStatus);

        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                $response['error']="User Already Exists";
            }
            return response()->json(['error'=>$response],403);
        }

    }

    public function details()
    {
    	$user = Auth::user();
    	return response()->json(['success'=>$user],$this->successStatus);
    }
}
